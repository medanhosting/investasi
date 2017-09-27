<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 27-Sep-17
 * Time: 2:14 PM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function BlogList(){
        return View('frontend.show-blogs');
    }

    public function SingleBlog(){
        return View('frontend.show-blog');
    }
}