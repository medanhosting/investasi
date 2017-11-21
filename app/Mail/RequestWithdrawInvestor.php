<?php
/**
 * Created by PhpStorm.
 * User: GMG-Developer
 * Date: 31/10/2017
 * Time: 11:12
 */

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestWithdrawInvestor extends Mailable
{
    use Queueable, SerializesModels;

    protected $statement;
    protected $user;
    protected $ipAddress;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($statement, $user, $ipAddress)
    {
        //
        $this->statement = $statement;
        $this->user = $user;
        $this->ipAddress = $ipAddress;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Penarikan Dana Investasi me")
            ->view('email.request-withdraw-investor')->with([
            'statement'     => $this->statement,
            'user'          => $this->user,
            'ipAddress'     => $this->ipAddress
        ]);
    }
}