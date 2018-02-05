<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $description;
    protected $phone;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $description)
    {
        //
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Pertanyaan Dari Contact Us")
            ->view('email.contact-us')->with([
                'email' => $this->email,
                'name' => $this->name,
                'description' => $this->description,
                'phone' => $this->phone
        ]);
    }
}
