<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Libs\UrgentNews;
use App\Libs\Utilities;
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

        $recentProducts = Product::where('status_id', 1)->orderByDesc('created_on')->take(3)->get();

        $recentBlogs = Blog::where('status_id', 1)
            ->orderByDesc('created_at')
            ->take(3)
            ->get();
        $highlightBlog = array();
        foreach ($recentBlogs as $blog){
            $string = Utilities::TruncateString($blog->description);

            $highlightBlog = array_add($highlightBlog,$blog->id, $string);
        }

        $user = null;
        $pendingTransaction = null;
        $onGoingTransaction = null;
        $finishTransaction = null;
        $recentProductCount = null;
        $onGoingProducts = null;

        if(auth()->check()){
            $user = Auth::user();
            $userId = $user->id;
            $blogs = UrgentNews::GetBlogList($userId);

            if(count($blogs) > 0){
                return View('frontend.show-blog-urgents', compact('blogs'));
            }

            $user = User::find($userId);
            $pendingTransaction = Transaction::where('user_id', $userId)->where('status_id', 3)->count();
            $onGoingTransaction = Transaction::where('user_id', $userId)->where('status_id', 5)->count();
            $finishTransaction = Transaction::where('user_id', $userId)->where('status_id', 9)->count();


            $recentProductCount = Product::where('status_id', 1)->orderByDesc('created_on')->take(5)->count();
            $onGoingProducts = Product::where('status_id', 1)->count();
        }

        $data = [
            'recentProducts' => $recentProducts,
            'recentBlogs' => $recentBlogs,
            'highlightBlog' => $highlightBlog,
            'user' => $user,
            'pendingTransaction' => $pendingTransaction,
            'onGoingTransaction' => $onGoingTransaction,
            'finishTransaction' => $finishTransaction,
            'recentProductCount' => $recentProductCount,
            'onGoingProducts' => $onGoingProducts,

        ];

        return View('frontend.home-new')->with($data);
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
