<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

class ReferralController extends Controller
{
    //
    public function ShowReferral(){
        //Get the data
        $user = Auth::user();
        $level1 = Referral::where('user_id_parent', $user->id)->get();

        $level2 = array();
        $lvl2Id = array();
        $level3 = array();
        if(count($level1) != 0){
            foreach ($level1 as $item){
                $temp = Referral::where('user_id_parent', $item->user_id_child)->get();

                if(count($temp) != 0) {
                    foreach ($temp as $nItem){
                        array_push($level2, $nItem);
                    }
                }
            }
        }

        //This function used if this is the last Level
        /*if(count($level2) != 0){
            foreach ($lvl2Id as $nItem){
                $data1 = User::find($nItem);
                array_push($level3, $data1);
                //array_push($level3, $data1->first_name . ' ' . $data1->last_name);
            }
        }*/

        //this Function used if there are more levels
        if(count($level2) != 0){
            foreach ($lvl2Id as $item1){
                if(Referral::where('user_id_parent', $item1)->exists()){
                    $temp1 = Referral::where('user_id_parent', $item1)->get();

                    foreach ($temp1 as $nItem1) {
                        array_push($level3, $nItem1);
                    }
                }
            }
        }

        return View ('frontend.referral', compact('level1', 'level2', 'level3'));
    }
}
