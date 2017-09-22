<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 18/09/2017
 * Time: 10:42
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\UserAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user_admins');
    }

    public function index(){
        $users = UserAdmin::all();

        return View('admin.show-users', compact('users'));
    }

    public function show($id){
        if(Auth::guard('user_admins')->user()->id != $id){
            return Redirect::route('admin-list');
        }

        $admin = UserAdmin::find($id);

        return View('admin.show-user', compact('admin'));
    }

    public function edit($id){
        if(Auth::guard('user_admins')->user()->id != $id){
            return Redirect::route('admin-list');
        }

        $admin = UserAdmin::find($id);

        return View('admin.edit-user', compact('admin'));
    }

    public function update(Request $request, $id){
        if(Auth::guard('user_admins')->user()->id != $id){
            return Redirect::route('admin-list');
        }

        $validator = Validator::make($request->all(),[
            'first-name'          => 'required|max:50',
            'last-name'              => 'required|max:50'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $admin = UserAdmin::find($id);
        $admin->first_name = Input::get('first-name');
        $admin->last_name = Input::get('last-name');
        $admin->save();

        return Redirect::route('admin-list');
    }

    public function passwordEdit($id){
        if(Auth::guard('user_admins')->user()->id != $id){
            return Redirect::route('admin-list');
        }

        return View('admin.edit-user-password');
    }

    public function passwordUpdate(Request $request, $id)
    {
        if(Auth::guard('user_admins')->user()->id != $id){
            return Redirect::route('admin-list');
        }

        $validator = Validator::make($request->all(), [
            'current-password'      => 'required',
            'password'              => 'required|min:6|max:20|same:password',
            'password-confirmation' => 'required|same:password'
        ]);

        if($validator->fails()){
            $this->throwValidationException(
                $request, $validator
            );
        }

        $curentPassword = Auth::guard('user_admins')->user()->password;
        if(Hash::check(Input::get('current-password'), $curentPassword))
        {
            $user_id = Auth::guard('user_admins')->user()->id;
            $obj_user = UserAdmin::find($user_id);
            $obj_user->password = Hash::make(Input::get('password'));
            $obj_user->save();

            Session::flash('message', 'Password Updated!');

            return Redirect::route('admin-show',[ 'id' => $id]);
        }
        else{
            return redirect()->back()->withErrors('Wrong Password!', 'default');
        }
    }
}