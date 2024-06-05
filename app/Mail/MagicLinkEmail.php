<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MagicLinkEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $magicLink;

    public function __construct($user, $magicLink)
    {
        $this->user = $user;
        $this->magicLink = $magicLink;
    }

    public function build()
    {
        return $this->view('emails.magic-link-email');
    }
}
