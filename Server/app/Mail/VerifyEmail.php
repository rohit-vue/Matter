<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $verificationUrl = url('http://localhost:3000/login?token=' . $this->user->remember_token);

        return $this->view('email.verify-email')
                    ->with([
                        'userName' => $this->user->username,
                        'verificationUrl' => $verificationUrl,
                    ]);
    }
}
