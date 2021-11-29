<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AcceptMail extends Mailable
{
    use Queueable, SerializesModels;
    public $accepts;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($accepts)
    {
        $this->accepts = $accepts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Accept leave request to you in E-LMSimple')->view('emails.acceptmail');
    }
}
