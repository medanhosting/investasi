<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 12-Oct-17
 * Time: 9:28 AM
 */
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendProspectus extends Mailable
{
    use Queueable, SerializesModels;

    protected $file_path;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($filePath)
    {
        //
        $this->file_path = $filePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Prospektus Investasi me")
            ->view('email.send-prospectus')->attach($this->file_path);
    }
}
