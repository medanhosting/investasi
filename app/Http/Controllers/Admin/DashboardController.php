<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 30/08/2017
 * Time: 10:53
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\NewOrder;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{public function __construct()
{
    $this->middleware('auth:user_admins');
}


    public function index(){

//        $user = Auth::user();
//        $user->notify(new NewOrder());

        $trxTotal = Transaction::where('status_id', 8)->get()->count();
        $customerTotal = User::where('status_id',1)->get()->count();

        $newOrderTotal = Transaction::where('status_id', 5)->get()->count();
        $onGoingPaymentTotal = Transaction::where('status_id', 3)
            ->orWhere('status_id',4)
            ->get()->count();

        $data =[
            'trxTotal'              => $trxTotal,
            'customerTotal'         => $customerTotal,
            'newOrderTotal'         => $newOrderTotal,
            'onGoingPaymentTotal'   => $onGoingPaymentTotal
        ];

        return View('admin.dashboard')->with($data);
    }
}