<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Services\EmailService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class EmailController extends Controller
{

    public function sendVerificationEmail($id)
    {
        $user = User::find($id);

        $verificationCode = Str::random(6);

        $data = [
            'verificationCode' => $verificationCode,
        ];

        // Store the verification code in the session for 10 minutes
        Session::put('verification_code', $verificationCode, 600);

        Mail::send('email.verify', $data, function ($message){
            $message->to($user->email);
            $message->subject('Verify Your Email Address');
        });

        return response([
            'message' => 'Verification code sent to your email address. Please check your email.',
            'status' => 'success'
        ], 200);
    }

    public function verifyEmail(Request $request)
    {
        try{
            $user = auth()->user();
            $verificationCode = $request->input('verification_code');

            if (Session::has('verification_code') && Session::get('verification_code') === $verificationCode) {

                $user->email_verified_at = now();
                $user->save();

                // Clear the session data
                Session::forget('verification_code');

                return response([
                    'message' => 'Email verified successfully.',
                    'status' => 'success'
                ], 200);
            }
         }catch(Exception $e) {
                return response([
                    'message' => $e->getMessage(),
                    'status' => 'error'
                ], 400);
            }
    }

}

