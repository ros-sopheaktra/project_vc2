<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class rejectRequested extends Mailable
{
    use Queueable, SerializesModels;
    public $verify;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($verify)
    {
        $this->verify = $verify;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Rejected leave request E-LMSimple')->view('emails.rejectLeaveRequest');
    }
}
