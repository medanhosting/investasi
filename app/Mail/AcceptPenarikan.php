<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AcceptPenarikan extends Mailable
{
    use Queueable, SerializesModels;

    protected $statement;
    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($statement, $user)
    {
        //
        $this->statement = $statement;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Penarikan Dana Diterima Investasi me")
            ->view('email.accept-penarikan')->with([
            'statement' => $this->statement,
            'user' => $this->user,
        ]);
    }
}
