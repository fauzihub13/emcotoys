<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from('no-reply@emcotoys.my.id', 'EmcoToys')
                    ->subject('Confirmation: Your Message Has Been Received')
                    ->view('user.pages.email.sendconfirmation')
                    ->with('data', $this->data);
    }
}
