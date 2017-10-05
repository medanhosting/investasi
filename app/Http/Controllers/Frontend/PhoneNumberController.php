<?php

namespace App\Http\Controllers\Frontend;

use App\Libs\Utilities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class PhoneNumberController extends Controller
{
    //
    public function VerifyPhoneNumber(){
        $randomNumber = '';
        for ($i = 0; $i<6; $i++)
        {
            $randomNumber .= mt_rand(0,9);
        }

        $userSession = Session::get('user-data');
        $phone = $userSession->phone;
        $id = $userSession->id;

        if($userSession->phone_token == null){
            $data = User::find($userSession->id);
            $data->phone_token = $randomNumber;
            $data->save();

            $test = Utilities::SendSms('081290003971', $randomNumber);
            if($test == null){
                //Return to a view to insert Another Phone???
            }
        };

        return View('auth.phone-verification', compact('phone', 'id'));
    }

    public function Verify(Request $request){
        $data = User::find($request->id);

        if($data->phone_token == $request->phone_token){
            $data->status_id = 12;
            $data->save();

            Session::flash('message', 'Phone Verified, Please Login!');
            Session::forget('user-data');
            return Redirect::route('login');
        }
        else{
            Session::flash('error', 'Wrong Verification Number!!');
            return Redirect::route('verify-phone-show');
        }
    }
}
