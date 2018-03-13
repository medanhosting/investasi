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
        $blogs = Blog::orderByDesc('created_at')->get();

        return View('admin.show-blogs', compact('blogs'));
    }


    public function create(){
        $categories = Category::all();
        $product = "";

        return View('admin.create-blog', compact('categories', 'product'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'title'              => 'required',
            'category'              => 'required',
            'content'            => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $dateTimeNow = Carbon::now('Asia/Jakarta');

        //Save Data
        $blogCreate = Blog::create([
            'id'            => Uuid::generate(),
            'title'         => $request->input('title'),
            'description'   => $request->input('content'),
            'category_id'   => $request->input('category'),
            'read_count'    => 0,
            'status_id'     => 3,
            'created_at'    => $dateTimeNow->toDateTimeString(),
            'created_by'    => Auth::guard('user_admins')->user()->id,
        ]);

        if($request->filled('product_id')){
            $blogCreate->product_id = $request->input('product_id');
            $blogCreate->save();
        }

        Session::flash('message', 'Blog telah berhasil dibuat!');

        return redirect()->route('admin-blog-list');
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
            return back()->withErrors($validator)->withInput();
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
            ->orderByDesc('created_at')->get();

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