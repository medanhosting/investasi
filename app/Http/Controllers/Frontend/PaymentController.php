<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 18/10/2017
 * Time: 10:30
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Libs\Midtrans;
use App\Libs\TransactionUnit;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PaymentController extends Controller
{
    public function checkout($id){
        $product = Product::find($id);
        if(!auth()->check()){
            return redirect()->route('project-detail', ['id' => $id]);
        }
        $user = Auth::user();
        $userId = $user->id;
        $userData = User::find($userId);
        $notCompletedData = 1;
        if($userData->identity_number== null &&
            $userData->dob == null &&
            $userData->address_ktp== null &&
            $userData->kecamatan_ktp== null &&
            $userData->postal_code_ktp== null)
        {
            $notCompletedData = 0;
        }

        return View('frontend.checkout', compact('product', 'userData', 'notCompletedData'));
    }

    public function pay(Request $request, $investId){
        try{
//            dd(Input::get('checkout-invest-amount-input'). " - ". Input::get('checkout-admin-fee-input'). " - ". Input::get('checkout-payment-method-input'));

            if(!auth()->check()){
                return redirect()->route('project-detail', ['id' => $investId]);
            }
            $user = Auth::user();
            $userId = $user->id;

            $paymentMethod = Input::get('checkout-payment-method-input');

            // Get unique order id
            $orderId = 'INVEST-'. uniqid();

            $investAmount = floatval(Input::get('checkout-invest-amount-input'));
            $adminFee = floatval(Input::get('checkout-admin-fee-input'));
            $isNotComplete = Input::get('checkout-notCompletedData');

            if($isNotComplete == 0){
                $user = User::find($userId);

                $user->identity_number = Input::get('checkout-KTP');
                $user->citizen = Input::get('checkout-citizen');
                $user->address_ktp = Input::get('checkout-address');
                $user->city_ktp = Input::get('checkout-city');
                $user->province_ktp = Input::get('checkout-province');
                $user->postal_code_ktp = Input::get('checkout-zip');

                $user->save();

            }

            // Delete existing cart
            $carts = Cart::where('product_id', $investId)
                ->where('user_id', $userId)
                ->get();
            if($carts->count() > 0){
                foreach($carts as $cart){
                    $cart->delete();
                }
            }

            // Save temporary data
            $cartCreate = Cart::create([
                'product_id'            => $investId,
                'user_id'               => $userId,
                'quantity'              => 1,
                'admin_fee'             => $adminFee,
                'order_id'              => $orderId,
                'payment_method'        => $paymentMethod,
                'invest_amount'         => $investAmount,
                'total_invest_amount'   => $investAmount + $adminFee
            ]);

            if($paymentMethod != 'wallet'){
                if($paymentMethod == 'bank_transfer'){
                    error_log("CHECK!");
                    $isSuccess = TransactionUnit::createTransaction($userId, $cartCreate->id, $orderId);
                }

                //set data to request
                $transactionDataArr = Midtrans::setRequestData($userId, Input::get('checkout-payment-method-input'), $orderId, $cartCreate);
//                dd($transactionDataArr);
                //sending to midtrans
                $redirectUrl = Midtrans::sendRequest($transactionDataArr);
//                dd($redirectUrl);

                return redirect($redirectUrl);
            }
            //if pay with dompet
            else{
                $userDB = User::find($userId);
                if($userDB->wallet_amount < $investAmount){
                    $isSuccess = TransactionUnit::createTransaction($userId, $cart->id + 1, $cart->order_id);

                    $paymentMethod = 'dompet';
                    return View('frontend.checkout-success', compact('paymentMethod'));
                }
                else{
                    return View('frontend.checkout-failed', compact('investId'));
                }

            }

        }
        catch(\Exception $ex){

        }
    }

    public function successCC($userId){
        try{
            $cart = Cart::where('user_id', $userId)->first();
            $isSuccess = TransactionUnit::createTransaction($userId, $cart->id, $cart->order_id);

            $paymentMethod = 'credit_card';
            return View('frontend.checkout-success', compact('paymentMethod'));
        }
        catch(\Exception $ex){

        }
    }

    public function successVA(){
        try{
            $paymentMethod = 'bank_transfer';
            return View('frontend.checkout-success', compact('paymentMethod'));
        }
        catch(\Exception $ex){

        }
    }

    public function failed($investId){
        try{
            return View('frontend.checkout-failed', compact('investId'));
        }
        catch(\Exception $ex){

        }
    }

    public function test(){
        $paymentMethod = 'credit_card';
        return View('frontend.checkout-success', compact('paymentMethod'));
    }
}