<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteToEvent extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $event;
    public $url;
    public $userMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url, $message)
    {
        $this->url = $url;
        $this->userMessage = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Someone invite you to an event!')
                    ->view('mail.share');
    }
}
