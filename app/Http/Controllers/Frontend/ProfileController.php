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


    public function GoogleMap()
    {
        return View('auth.address-verification');
    }
}