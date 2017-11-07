<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $rules = array(
            'email'                 => 'required|email|not_contains',
            'password'              => 'required',
        );

        $messages = array(
            'not_contains' => 'Email tidak boleh memiliki karakter + !',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        //$this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);

        //Custom Logic
        if(!User::where('email', $request->email)->exists()){
            return Redirect::back()->withErrors(['msg' => ['Salah Username atau Password!']]);
        }

        $userData = User::where('email', $request->email)->first();

        if($userData->status_id == 3){
            $email = $userData->email;
            return View('auth.send-email', compact('email'));
        }
        else if($userData->status_id == 11){
            Session::put("user-data", $userData);
            return Redirect::route('index');
        }

        //Check if Google Authenticator
        if($userData->google_authenticator == 1){
            session()->put('id', $userData->id);
            session()->put('email', $userData->email);
            session()->put('password', Input::get('password'));
            return View('auth.google-authenticator');
        }

        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function GoogleAuthenticatorLogin(Request $request)
    {
        $secret = Input::get('secret');
        $google2fa = new Google2FA();
        $userId = session()->get('id');

        $user = User::find($userId);

        $valid = $google2fa->verifyKey($user->google2fa_secret, $secret);
        if($valid){
            $email = session()->get('email');
            $password = session()->get('password');

            if($this->guard()->attempt(['email' => $email, 'password' => $password]))
            {
                return Redirect::route('index');
            }

            return Redirect::route('login')->withErrors(['msg' => ['Something went Wrong!']]);
        }
        else{
            return View('auth.google-authenticator')->withErrors(['msg' => ['Kode yang Anda masukan salah!']]);
        }
    }
}
