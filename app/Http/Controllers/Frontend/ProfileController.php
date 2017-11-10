<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 27-Sep-17
 * Time: 2:14 PM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use PragmaRX\Google2FA\Google2FA;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Profile($tab)
    {
        if(!auth()->check()){
            return redirect()->route('index');
        }

        $authUser = Auth::user();
        $userId = $authUser->id;

        $user = User::find($userId);
        $google2fa_url = '';

        $isActiveProfile = ""; $isActiveSecurity = "";$isActivePassword = "";$isActivePhone = "";
        $isActiveTabProfile = "";$isActiveTabSecurity = "";$isActiveTabPassword = "";$isActiveTabPhone = "";
        if($tab == "profile") {
            $isActiveProfile = "in active";
            $isActiveTabProfile = "class=active";
        }
        else if($tab == "security") {
        $isActiveSecurity = "in active";
        $isActiveTabSecurity = "class=active";
    }
        else if($tab == "password") {
            $isActivePassword = "in active";
            $isActiveTabPassword = "class=active";
        }
        else if($tab == "phone") {
            $isActivePhone = "in active";
            $isActiveTabPhone = "class=active";
        }

        //Generate Google Authenticator
        if($user->google_authenticator == 0) {
            $google2fa = new Google2FA();
            $user->google2fa_secret = $google2fa->generateSecretKey();
            $google2fa_url = $google2fa->getQRCodeGoogleUrl(
                'investasi.me - '.$user->username.' - ',
                $user->email,
                $user->google2fa_secret
            );

            $user->save();
        }

//        return View ('frontend.show-profile', compact('user', 'selectedTab', 'google2fa_url'));
        $data = [
            'user'=>$user,
            'google2fa_url'=>$google2fa_url,
            'isActiveProfile'=>$isActiveProfile,
            'isActiveSecurity'=>$isActiveSecurity,
            'isActivePassword'=>$isActivePassword,
            'isActivePhone'=>$isActivePhone,
            'isActiveTabProfile'=>$isActiveTabProfile,
            'isActiveTabSecurity'=>$isActiveTabSecurity,
            'isActiveTabPassword'=>$isActiveTabPassword,
            'isActiveTabPhone'=>$isActiveTabPhone
        ];
        return View ('frontend.show-profile')->with($data);
    }

    public function VerifyGoogleAuthenticator(Request $request)
    {
        $secret = Input::get('secret');
        $google2fa = new Google2FA();
        $authUser = Auth::user();
        $userId = $authUser->id;

        $user = User::find($userId);

        $valid = $google2fa->verifyKey($user->google2fa_secret, $secret);
        if($valid){
            $user->google_authenticator = 1;
            $user->save();
            return Redirect::route('my-profile', ['tab' => 'security']);
        }
        else{
            return Redirect::back()->withErrors(['msg' => ['Kode yang Anda masukan salah!']]);
        }
    }

    public function DeactivateGoogleAuthenticator(Request $request)
    {
        $secret = Input::get('secret');
        $google2fa = new Google2FA();
        $userData = Auth::user();
        $userId = $userData->id;
        $user = User::find($userId);

        $valid = $google2fa->verifyKey($user->google2fa_secret, $secret);
        if($valid) {
            $user->google_authenticator = 0;
            $user->save();
            return Redirect::route('my-profile', ['tab' => 'security']);
        }
        else{
            return Redirect::back()->withErrors(['msg' => ['Kode yang Anda masukan salah!']]);
        }
    }

    public function Pendapatan()
    {
        $user = Auth::user();
        $userId = $user->id;

        $transactions = Transaction::Where('user_id', $userId);
        return View ('frontend.show-pendapatan', compact('transactions'));
    }


    public function GoogleMap()
    {
        return View('auth.address-verification');
    }

    public function GoogleMapSubmit(Request $request)
    {
        $lat = Input::get('geo-latitude');
        $lng = Input::get('geo-longitude');

        $userAuth = Auth::user();
        $userId = $userAuth->id;

        $user = User::find($userId);
        $user->address_latitude = $lat;
        $user->address_longitude = $lng;
        $user->status_id = 1;

        $user->save();
        return View('frontend.home');
    }
}