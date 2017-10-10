<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class VerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function verifyPhoto(){
        $user = Auth::user();
        if($user->status_id == 13){
            return back();
        }
        return View('frontend.photo-verification');
    }

    public function uploadPhoto(Request $request){
        $user = User::find(Auth::user()->id);
        $user->status_id = 13;

        // Get image extension
        $img = Image::make($request->file('verification-photo'));
        $extStr = $img->mime();
        $ext = explode('/', $extStr, 2);

        $filename = $user->first_name.'_'.$user->last_name.'_'.Carbon::now('Asia/Jakarta')->format('Ymdhms'). '_0.'. $ext[1];

        $img->save(public_path('storage/photo_verification/'. $filename), 75);

        $user->photo_validation = $filename;
        $user->save();
        return View('frontend.photo-verification-done');
    }
}
