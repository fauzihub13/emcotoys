<?php

namespace App\Http\Controllers;

use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;

class MailController extends Controller
{
    public function sendEmail()
    {
        $mailersend = new MailerSend([
            'api_key' =>'mlsn.da68183bbddab58e2ba32ac6c2d0ac1bbe52dd3a2b44d5abdf5aabd2f810bc67'
        ]);

        $recipients = [
            new Recipient('dnfdika@gmail.com', 'Your Client'),
        ];

        $emailParams = (new EmailParams())
            ->setFrom('jedarjederbp2@gmail.com')
            ->setFromName('Your Name')
            ->setRecipients($recipients)
            ->setSubject('Test Email')
            ->setHtml('<h1>This is the HTML content</h1>')
            ->setText('This is the text content');

        $mailersend->email->send($emailParams);

        return response()->json(['message' => 'Email sent successfully!']);
    }
}
