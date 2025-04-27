<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from('no-reply@emcotoys.my.id', 'EmcoToys')
                    ->subject('New Contact Form Submission')
                    ->view('user.pages.email.contact')
                    ->with('data', $this->data);
    }
}
