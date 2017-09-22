<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 29/08/2017
 * Time: 9:24
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginAdminController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(),
            [
                'email'           => 'required|email|max:100',
                'password'        => 'required|min:6|max:20'
            ]
        );

        if($validator->fails()){
            $this->throwValidationException(
                $request, $validator
            );
        }

        $email = $request->input('email');
        $pass = $request->input('password');

        if(Auth::guard('user_admins')->attempt(['email' => $email, 'password' => $pass])){
            return Redirect::route('admin-dashboard');
        }
        else{
            return redirect()->back()->withErrors('Wrong Email or Password!!', 'default')->withInput($request->only('email'));
        }
        //error_log($passEncrypted);

        /*$userAdmin = UserAdmin::where('email', '=', $email)->first();

        $failed = "failed";
        if(!isset($userAdmin)){
            //return redirect()->route('login-admin', compact('msg'));
            //return view('admin.login')->with('msg', $msg);
            return redirect()->route('login-admin-failed', $failed);
        }

        if (!Hash::check($pass, $userAdmin->password)) {
            //return redirect()->route('login-admin', compact('msg'));
            return redirect()->route('login-admin-failed', $failed);
        }
        else
        {
            session(['admin_fname' => $userAdmin->first_name]);
            session(['admin_lname' => $userAdmin->last_name]);
            session(['admin_id' => $userAdmin->id]);
            session(['admin_email' => $userAdmin->email]);
            //return redirect()->route('admin-dashboard', "test");
            return view('admin.dashboard')->with('test', 'testing');
        }*/


//        if(!$userAdmin->count()){
//            return redirect()->route('login-admin', compact('msg'));
//        }else{
//            return redirect()->route('admin-dashboard');
//        }
    }

    public function logout(){
        Auth::guard('user_admins')->logout();
        return redirect()->route('login-admin');
    }
}