<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CardMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $details;


    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->subject('Card Created')
                    ->view('emails.card');
    }
}
