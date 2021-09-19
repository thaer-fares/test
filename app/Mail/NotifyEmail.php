<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $details; //array
    public function __construct($data)
    {
        $this->details= $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
     //   return $this->view('emails.notifyUser');
        return $this->view('emails.notifyUser')->with($this->details);
    }
}
