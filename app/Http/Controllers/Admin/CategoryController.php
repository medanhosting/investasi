<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 08/09/2017
 * Time: 14:19
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user_admins');
    }

    public function index(){
        $categories = Category::all();

        return View('admin.show-categories', compact('categories'));
    }

    public function create(){
        return View('admin.create-category');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'      => 'required'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $category = Category::create([
            'name'      => Input::get('name')
        ]);

        Session::flash('message', 'Create Success!');

        return redirect('/admin/category');
    }

    public function edit($id){
        $category = Category::find($id);

        return View('admin.edit-category', compact('category'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name'      => 'required'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $category = Category::find($id);
        $category->name = Input::get('name');
        $category->save();

        Session::flash('message', 'Update Success!');

        return redirect('/admin/category');
    }
}