<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Subscribe extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email)
    {
        //
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Subscribe ke Investasi me")
            ->view('email.subscribe')->with([
                'email' => $this->email,
                'name' => $this->name
        ]);
    }
}
