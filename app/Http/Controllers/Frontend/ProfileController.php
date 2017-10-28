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
use Illuminate\Support\Facades\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Profile()
    {
        $user = Auth::user();
        $userId = $user->id;

        $user = User::find($userId);
        return View ('frontend.show-profile', compact('user'));
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