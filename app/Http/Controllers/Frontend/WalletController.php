<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 03-Oct-17
 * Time: 2:23 PM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WalletStatement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Webpatser\Uuid\Uuid;

class WalletController extends Controller
{
    public function Wallet()
    {
        $user = Auth::user();
        $userId = $user->id;

        $statements = WalletStatement::where('user_id', $userId)->orderByDesc('created_on')->get();
        return View ('frontend.show-wallet', compact('statements'));
    }
    public function DepositShow()
    {
        $user = Auth::user();
        $userId = $user->id;

        $statements = WalletStatement::where('user_id', $userId)->get();
        return View ('frontend.wallet-deposit', compact('statements'));
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
                    'description'   => "Withdrawal Deposito (".$bank." - ".$accName." - ".$accNumber.")",
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