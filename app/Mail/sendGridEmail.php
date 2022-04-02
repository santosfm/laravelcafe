<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendGridEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    //public $details;

    public function __construct($data)
    {
        $this->data = $data;
    }

    // public function __construct($details)
    // {
    //     $this->details = $details;
    // }

    public function build()
    {
        $address = 'laravelrestaurant@outlook.com';
        $subject = 'Email from Klassy';
        $name = 'Klassy';

        return $this->view('emails.sendGrid')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with(['name' => $this->data['name'],        
                            'email' => $this->data['email'],
                            'msg' => $this->data['msg']]);
    }
}