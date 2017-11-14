<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoicePembelian;
use App\Models\Blog;
use App\Models\BlogReadUser;
use App\Models\BlogUrgent;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    protected function GetBlogList($userId){

            $notReadBlogId = [];
            $blogUrgents = BlogUrgent::select('id')->where('status_id', 1)->get();

            foreach($blogUrgents as $blogUrgent){
                array_push($notReadBlogId, $blogUrgent->id);
            }

            //get user blog read list
            $blogReadUsers = BlogReadUser::where('user_id', $userId)
//                ->where('status_id', 2)
                ->wherein('blog_urgent_id', $notReadBlogId)
                ->get();


            //delete already read blog
            foreach($blogReadUsers as $blogRead){
                if($blogRead->status_id == 2){
                    $notReadBlogId = array_diff($notReadBlogId, [$blogRead->blog_urgent_id]);
                }
            }

            $blogReadFinalArr = [];
            if(count($blogReadUsers) > 0 || count($notReadBlogId) > 0) {
                foreach ($notReadBlogId as $BlogId) {
                    $blogReadUsers2 = BlogReadUser::where('user_id', $userId)
                        ->where('blog_urgent_id', $BlogId)
                        ->count();

                    //if already in DB, and not read
                    if ($blogReadUsers2 > 0) {
                        $blog = $blogReadUsers->where('blog_urgent_id', $BlogId)->where('status_id', 1)->first();

                        $blogUrgent = BlogUrgent::find($blog->blog_urgent_id);
                        $blogDB = Blog::find($blogUrgent->Blog->id);

                        array_push($blogReadFinalArr, $blogDB->id);
                    } //not yet save on database
                    else {
                        $blogReadUserNew = BlogReadUser::create([
                            'user_id' => $userId,
                            'blog_urgent_id' => $BlogId,
                            'status_id' => 1
                        ]);

                        $blogUrgent = BlogUrgent::find($BlogId);
                        $blogDB = Blog::find($blogUrgent->Blog->id);

                        array_push($blogReadFinalArr, $blogDB->id);

                    }
                }
            }
            $blogReadUsers = Blog::wherein('id', $blogReadFinalArr)->get();

            return $blogReadUsers;
    }

    //
    public function Home(){

        $recentProducts = Product::where('status_id', '!=',3)->orderByDesc('created_on')->take(3)->get();

        $recentBlogs = Blog::where('status_id', 1)
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        if(auth()->check()){
            $user = Auth::user();
            $userId = $user->id;
            $blogs = $this->GetBlogList($userId);

            if(count($blogs) > 0){
                return View('frontend.show-blog-urgents', compact('blogs'));
            }
        }

        return View('frontend.home', compact('recentProducts', 'recentBlogs'));
    }

    //
    public function AboutUs(){
        return View('frontend.about-us');
    }

    //
    public function TermCondition(){
        return View('frontend.term-condition');
    }

    //
    public function PrivacyPolicy(){
        return View('frontend.privacy-policy');
    }

    //
    public function ContactUs(){
        return View('frontend.contact-us');
    }

    public function Tutorial(){
        return View('frontend.show-tutorial');
    }
    public function Pengajuan(){
        return View('frontend.apply-owner');
    }
}
