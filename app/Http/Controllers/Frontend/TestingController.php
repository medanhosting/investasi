<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 18/10/2017
 * Time: 13:52
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Libs\Utilities;
use App\Libs\Veritrans;
use App\Mail\InvoicePembelian;
use App\Mail\PerjanjianLayanan;
use App\Mail\PerjanjianPinjaman;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionWallet;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TestingController extends Controller
{
    public function TestingSendEmail(){
        try{
            $transaction = Transaction::find("bc180210-15ec-11e8-ac7e-bb8c06660ba7");

            //Send Email,
            $userData = User::find($transaction->user_id);
            $payment = PaymentMethod::find($transaction->payment_method_id);
            $product = Product::find($transaction->product);

            $data = array(
                'transaction' => $transaction,
                'user'=>$userData,
                'paymentMethod' => $payment,
                'product' => $product
            );

            $pdf = PDF::loadView('email.perjanjian-layanan', $data);
            $pdf2 = PDF::loadView('email.perjanjian-pinjaman', $data);

            $invoiceEmail = new InvoicePembelian($payment, $transaction, $product, $userData);
            Mail::to($userData->email)
                ->send($invoiceEmail)
                ->attachData($pdf, 'Perjanjian Layanan.pdf', [
                    'mime' => 'application/pdf',
                ])
                ->attachData($pdf2, 'Perjanjian Pinjaman.pdf', [
                    'mime' => 'application/pdf',
                ]);

            return "success";
        }
        catch (\Exception $ex){
            Utilities::ExceptionLog($ex);
            return "failed : ".$ex;
        }
    }
}