<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 22-Sep-17
 * Time: 4:03 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Webpatser\Uuid\Uuid;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user_admins');
    }


    public function create(){
        return View('admin.create-blog');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'title'              => 'required',
            'content'            => 'required']);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $dateTimeNow = Carbon::now('Asia/Jakarta');

        //Save Data
        $cartCreate = Blog::create([
            'id'            => Uuid::generate(),
            'title'               => Input::get('title'),
            'description'              => Input::get('content'),
            'read_count'              => 0,
            'status_id'              => 1,
            'created_at'    => $dateTimeNow->toDateTimeString(),
        ]);

        return View('admin.create-blog');
    }

}