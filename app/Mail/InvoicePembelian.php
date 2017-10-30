<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 30-Oct-17
 * Time: 10:24 AM
 */

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoicePembelian extends Mailable
{
    use Queueable, SerializesModels;

    protected $transaction;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($transactionDB)
    {
        //
        $this->transaction = $transactionDB;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.invoice-pembelian')->with([
            'transaction' => $this->transaction,
        ]);
    }

}