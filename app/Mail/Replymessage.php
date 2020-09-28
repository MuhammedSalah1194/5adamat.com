<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Replymessage extends Mailable
{
    use Queueable, SerializesModels;

    protected $message;

    protected $reply;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $reply){
        $this->message = $message;
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $Contactmessage = $this->message;
        $reply = $this->reply;
        return $this->to($Contactmessage->email)->
        view('dashboard.mails.reply', compact('Contactmessage', 'reply'));
    }
}