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

    //
    public function Home(){

        $recentProducts = Product::where('status_id', '!=',3)->orderByDesc('created_on')->take(3)->get();

        if(auth()->check()){
            $user = Auth::user();
            $userId = $user->id;

//            $notReadBlogId = [];
//            $blogUrgents = BlogUrgent::select('id')->where('status_id', 1)->get();
//
//            array_push($notReadBlogId, $blogUrgents);
//
//
//            $blogReadUsers = BlogReadUser::where('user_id', $userId)
//                ->wherein('blog_urgent_id', $blogUrgents)
//                ->get();
//            foreach($blogReadUsers as $blogRead){
//                if($blogRead->status_id == 2){
//                    unset($notReadBlogId[$blogRead->blog_urgent_id]);
//                }
//            }
//
//            $blogReadFinal = [];
//            if(count($notReadBlogId) > 0){
//                for($i=0; $i<count($notReadBlogId); $i++){
//                    if($blogReadUsers->where('blog_urgent_id', $notReadBlogId[0][$i]->id)->where('status_id', 1))
//                    {
//                        $blog = $blogReadUsers->where('blog_urgent_id', $notReadBlogId[0][$i]->id)->where('status_id', 1)->first();
//
//                        $blogDB = Blog::find($blog->BlogUrgent->Blog->id);
//                        array_push($blogReadFinal, $blogDB);
//                    }
//                    else
//                    {
//                        $blogReadUserNew = BlogReadUser::create([
//                            'user_id' => $userId,
//                            'blog_urgent_id' => $notReadBlogId[0][$i]->id,
//                            'status_id' => 1
//                        ]);
//                    }
//                }
//            }



//            foreach ($blogUrgents as $blogUrgent){
//                $blogRead = BlogReadUser::where('blog_urgent_id', $blogUrgent->id)->where('user_id', $userId)->get();
//            }
        }

        return View('frontend.home', compact('recentProducts'));
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
