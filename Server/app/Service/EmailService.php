<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendEmail($user)
    {
        $verificationLink = route('email.verify', ['id' => $user->id, 'hash' => sha1($user->email)]);
        $token = str_random(40);

        $data = [
            'name' => $user->name,
            'verificationLink' => $verificationLink,
            'token' => $token,
        ];

        Mail::send('email.verify', $data, function ($message) use ($user) {
            $message->to($user->email, $user->username)
                ->subject('Verify Your Email Address');
        });
    }
}
