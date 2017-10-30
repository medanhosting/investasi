<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 03-Oct-17
 * Time: 2:23 PM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Libs\Midtrans;
use App\Libs\TransactionUnit;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WalletStatement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Webpatser\Uuid\Uuid;
use App\Libs\Utilities;

class WalletController extends Controller
{
    public function Wallet()
    {
        $user = Auth::user();
        $userId = $user->id;
        $user = User::find($userId);
        $statements = WalletStatement::where('user_id', $userId)->orderByDesc('created_on')->get();
        return View ('frontend.show-wallet', compact('statements', 'user'));
    }

    public function DepositShow()
    {
        $user = Auth::user();
        $userId = $user->id;

        $statements = WalletStatement::where('user_id', $userId)->get();
        return View ('frontend.wallet-deposit', compact('statements'));
    }

    public function DepositSubmit(Request $request){
        $validator = Validator::make($request->all(),[
            'amount'        => 'required',
            'method'        => 'required'
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = Auth::user();
        $userId = $user->id;

        $paymentMethod = Input::get('method');

        // Get unique order id
        $orderId = 'WALLET-'. uniqid();

        $amount = floatval(Input::get('amount'));

        // Delete existing cart
        $carts = Cart::where('user_id', $userId)
            ->whereNull('product_id')
            ->get();

        if($carts->count() > 0){
            foreach($carts as $cart){
                $cart->delete();
            }
        }

        $adminFee = 0;
        if($paymentMethod == 'bank_transfer'){
            $adminFee = 4000;
        }

        // Save temporary data
        $cartCreate = Cart::create([
            'user_id'               => $userId,
            'quantity'              => 1,
            'admin_fee'             => 4000,
            'order_id'              => $orderId,
            'payment_method'        => $paymentMethod,
            'invest_amount'         => $amount,
            'total_invest_amount'   => $amount + $adminFee
        ]);

        if($paymentMethod == 'bank_transfer'){
            $isSuccess = TransactionUnit::createTransactionTopUp($userId, $cartCreate->id, $orderId);
        }

        //set data to request
        $transactionDataArr = Midtrans::setRequestData($userId, $paymentMethod, $orderId, $cartCreate);

        //sending to midtrans
        $redirectUrl = Midtrans::sendRequest($transactionDataArr);

        return redirect($redirectUrl);
    }

    public function DepositSuccess($method){
        if($method == 'bank_transfer'){
            return View('frontend.wallet-deposit-success', compact('method'));
        }
        else{
            dd("OTHERS");
        }
    }

    public function DepositFailed(){
        return View('frontend.wallet-deposit-failed');
    }

    public function WithdrawShow()
    {
        $user = Auth::user();
        $userId = $user->id;

        return View ('frontend.wallet-withdraw');
    }

    //withdraw process
    public function WithdrawSubmit(Request $request){
        try{

            $user = Auth::user();
            $userId = $user->id;

            $validator = Validator::make($request->all(),[
                'amount'        => 'required',
                'acc_number'    => 'required',
                'acc_name'      => 'required',
                'bank'          => 'required'
            ]);

            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );
            }
            else {
                $dateTimeNow = Carbon::now('Asia/Jakarta');

                $amount = Input::get('amount');
                $accNumber = Input::get('acc_number');
                $accName = Input::get('acc_name');
                $bank = Input::get('bank');
                //status 3=pending, 6=accepted, 7=rejected
                $newStatement = WalletStatement::create([
                    'id'            => Uuid::generate(),
                    'user_id'       => $userId,
                    'description'   => "Penarikan Dompet (".$bank." - ".$accName." - ".$accNumber.")",
                    'amount'          => $amount,
                    'date'         => $dateTimeNow->toDateTimeString(),
                    'status_id'        => 3,
                    'created_on'    => $dateTimeNow->toDateTimeString()
                ]);
                $newStatement->save();
            }

            //return ke page transaction
            return redirect()->route('my-wallet');
        }
        catch (\Exception $ex){
            Utilities::ExceptionLog('WalletWithdrawSubmit EX = '. $ex);
        }

    }
}