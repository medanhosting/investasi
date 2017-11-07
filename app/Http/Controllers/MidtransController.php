<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 18/10/2017
 * Time: 13:52
 */

namespace App\Http\Controllers;


use App\Libs\Utilities;
use App\Libs\Veritrans;
use App\Mail\InvoicePembelian;
use App\Models\Transaction;
use App\Models\TransactionWallet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MidtransController extends Controller
{
    public function __construct(){
        Veritrans::$serverKey = env('MIDTRANS_API_KEY_SANDBOX');
        Veritrans::$isProduction = false;
    }

    public function notification(){
        try
        {
            $json_result = file_get_contents('php://input');
            $json = json_decode($json_result);
            $vt = new Veritrans;
            $notif = $vt->status($json->order_id);

            $orderid = $notif->order_id;

            DB::transaction(function() use ($orderid, $json){

                Utilities::ExceptionLog($json);
                Utilities::ExceptionLog($orderid);

                $dateTimeNow = Carbon::now('Asia/Jakarta');

                sleep(5);

                $type = explode('-', $orderid);

                // Transaction type is WALLET TOP UP
                if($type[0] == 'WALLET'){
                    $transaction = TransactionWallet::where('order_id', $orderid)->first();

                    if($json->status_code == "200"){
                        if(($json->transaction_status == "capture" || $json->transaction_status =="accept") && $json->fraud_status == "accept"){
                            $transaction->status_id = 17;

                            // Filter payment type
                            if($json->payment_type == "bank_transfer"){
                                // Filter bank
                                if(!empty($json->permata_va_number)){
                                    $transaction->va_bank = "permata";
                                    $transaction->va_number = $json->permata_va_number;
                                }
                                else if(!empty($json->va_numbers)){
                                    $transaction->va_bank = $json->va_numbers[0]->bank;
                                    $transaction->va_number = $json->va_numbers[0]->va_number;
                                }
                            }
                            else if($json->payment_type == "echannel"){
                                $transaction->va_bank = "mandiri";
                                $transaction->bill_key = $json->bill_key;
                                $transaction->biller_code = $json->biller_code;
                            }

                            $transaction->updated_at = $dateTimeNow->toDateTimeString();
                            $transaction->save();
                        }
                    }
                    else if($json->status_code == "201"){

                        // Filter payment type
                        if($json->payment_type == "bank_transfer"){

                            // Filter bank
                            if(!empty($json->permata_va_number)){
                                $transaction->va_bank = "permata";
                                $transaction->va_number = $json->permata_va_number;
                            }
                            else if(!empty($json->va_numbers)){
                                $transaction->va_bank = $json->va_numbers[0]->bank;
                                $transaction->va_number = $json->va_numbers[0]->va_number;
                            }

                            $transaction->updated_at = $dateTimeNow->toDateTimeString();
                            $transaction->save();
                        }
                        else if($json->payment_type == "echannel"){
                            $transaction->bill_key = $json->bill_key;
                            $transaction->biller_code = $json->biller_code;

                            $transaction->updated_at = $dateTimeNow->toDateTimeString();
                            $transaction->save();
                        }
//                        else if($json->payment_type == "credit_card"){
//                            $transaction->status_id = 11;
//
//                            $transaction->updated_at = $dateTimeNow->toDateTimeString();
//                            $transaction->save();
//                        }
                    }
                    else if($json->status_code == "202"){
                        $transaction->status_id = 10;
                        $transaction->updated_at = $dateTimeNow->toDateTimeString();
                        $transaction->save();
                    }
                    else{
                        // Log error exception here
                    }
                }
                // Transaction type is INVEST PAYMENT
                else{
                    $transaction = Transaction::where('order_id', $orderid)->first();

                    if($json->status_code == "200"){
                        if(($json->transaction_status == "capture" || $json->transaction_status =="accept") && $json->fraud_status == "accept"){
                            $transaction->status_id = 5;

                            // Filter payment type
                            if($json->payment_type == "bank_transfer"){
                                // Filter bank
                                if(!empty($json->permata_va_number)){
                                    $transaction->va_bank = "permata";
                                    $transaction->va_number = $json->permata_va_number;
                                }
                                else if(!empty($json->va_numbers)){
                                    $transaction->va_bank = $json->va_numbers[0]->bank;
                                    $transaction->va_number = $json->va_numbers[0]->va_number;
                                }
                            }
                            else if($json->payment_type == "echannel"){
                                $transaction->va_bank = "mandiri";
                                $transaction->bill_key = $json->bill_key;
                                $transaction->biller_code = $json->biller_code;
                            }

                            $transaction->modified_on = $dateTimeNow->toDateTimeString();
                            $transaction->save();


                            //Send Email,
                            $userData = User::find($transaction->user_id);
                            $payment = PaymentMethod::find($transaction->payment_method_id);

                            $acceptEmail = new InvoicePembelian($payment, $transaction, $userData);
                            Mail::to($userData->email)->send($acceptEmail);
                        }
                    }
                    else if($json->status_code == "201"){
                        // Filter payment type
                        if($json->payment_type == "bank_transfer"){
                            $transaction->status_id = 4;

                            // Filter bank
                            if(!empty($json->permata_va_number)){
                                $transaction->va_bank = "permata";
                                $transaction->va_number = $json->permata_va_number;
                            }
                            else if(!empty($json->va_numbers)){
                                $transaction->va_bank = $json->va_numbers[0]->bank;
                                $transaction->va_number = $json->va_numbers[0]->va_number;
                            }

                            $transaction->modified_on = $dateTimeNow->toDateTimeString();
                            $transaction->save();
                        }
                        else if($json->payment_type == "echannel"){
                            $transaction->bill_key = $json->bill_key;
                            $transaction->biller_code = $json->biller_code;

                            $transaction->modified_on = $dateTimeNow->toDateTimeString();
                            $transaction->save();
                        }
                        else if($json->payment_type == "credit_card"){
                            $transaction->status_id = 11;

                            $transaction->modified_on = $dateTimeNow->toDateTimeString();
                            $transaction->save();
                        }
                    }
                    else if($json->status_code == "202"){
                        $transaction->status_id = 10;
                        $transaction->modified_on = $dateTimeNow->toDateTimeString();
                        $transaction->save();
                    }
                    else{
                        // Log error exception here
                    }
                }

            }, 5);
        }
        catch (\Exception $ex){
            Utilities::ExceptionLog($ex);
        }
    }
}