<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;

class PostRegVerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $name;
    public $password;
    
    public function __construct($user)
    {
        $this->email = $user['email'];
        $this->name = $user['firstname'] . ' ' . $user['lastname'];
        $this->password = $user['password'];
    }

    public function build()
    {
        return $this->view('mail.post_reg_verify_email')
                ->from('dabk.uche@yahoo.com', $this->name)
                //->cc($address, $name)
                //->bcc($address, $name)
                //->replyTo('no-reply', 'Do not reply this email')
                ->subject('Welcome to TimeBill');
    }
}
