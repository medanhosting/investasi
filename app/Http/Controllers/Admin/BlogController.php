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
use App\Models\Category;
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

    public function index(){
        $blogs = Blog::all();

        return View('admin.show-blogs', compact('blogs'));
    }


    public function create(){
        $categories = Category::all();

        return View('admin.create-blog', compact('categories'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'title'              => 'required',
            'category'              => 'required',
            'content'            => 'required'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $dateTimeNow = Carbon::now('Asia/Jakarta');

        //Save Data
        $cartCreate = Blog::create([
            'id'            => Uuid::generate(),
            'title'         => Input::get('title'),
            'description'   => Input::get('content'),
            'category_id'   => Input::get('category'),
            'read_count'    => 0,
            'status_id'     => 2,
            'created_at'    => $dateTimeNow->toDateTimeString(),
        ]);

        Session::flash('message', 'Blog telah berhasil dibuat!');

        $categories = Category::all();
        return View('admin.create-blog', compact('categories'));
    }

    public function edit($id){
        $blog = Blog::find($id);
        $categories = Category::all();

        $data = [
            'blog'          => $blog,
            'categories'    => $categories
        ];

        return View('admin.edit-blog')->with($data);
    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'title'              => 'required',
            'category'              => 'required',
            'content'            => 'required']);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $dateTimeNow = Carbon::now('Asia/Jakarta');

        $blog = Blog::find($id);
        $blog->title = Input::get('title');
        $blog->description = Input::get('content');
        $blog->category_id = Input::get('category');
        $blog->status_id = Input::get('status');
        $blog->updated_at = $dateTimeNow->toDateTimeString();
        $blog->save();

        Session::flash('message', 'Blog telah berhasil diubah!');

        return redirect()->route('admin-blog-list');
    }

    public function indexUpdate(){
        $blogs = Blog::where('status_id', 3)
            ->whereNull('product_id')
            ->get();

        return View('admin.show-blog-updates', compact('blogs'));
    }

    public function accept($id){

        $dateTimeNow = Carbon::now('Asia/Jakarta');

        $blog = Blog::find($id);
        $blog->status_id = 1;
        $blog->updated_at = $dateTimeNow->toDateTimeString();
        $blog->save();

        Session::flash('message', 'Pembaharuan blog telah berhasil diterima!');

        return redirect()->route('admin-blog-update-list');
    }

    public function reject($id){

        $dateTimeNow = Carbon::now('Asia/Jakarta');

        $blog = Blog::find($id);
        $blog->status_id = 7;
        $blog->updated_at = $dateTimeNow->toDateTimeString();
        $blog->save();

        Session::flash('message', 'Pembaharuan blog telah ditolak!');

        return redirect()->route('admin-blog-update-list');
    }
}