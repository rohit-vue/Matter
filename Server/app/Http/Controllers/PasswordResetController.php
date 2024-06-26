<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PasswordResetController extends Controller
{
    public function send_reset_password_email(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        $email = $request->email;

        //* Check User's Email Exists or Not
        $user = User::where('email', $email)->first();
        if(!$user){
            return response([
                'message'=>'Email doesnt exists',
                'status'=>'failed'
            ], 404);
        }
        $token = Str::random(60);

        //* Saving Data to Password Reset Table
        PasswordReset::create([
            'email'=>$email,
            'token'=>$token,
            'created_at'=>Carbon::now()
        ]);

        //* Sending EMail with **Password Reset** View
        Mail::send('email.resetpassword', ['token'=>$token], function(Message $message)use($email){
            $message->subject('Reset Your Password');
            $message->to($email);
        });

        return response([
            'message'=>'Password Reset Email Sent... Check Your Email',
            'status'=>'success'
        ], 200);
    }

    public function reset(Request $request, $token){
        //! Delete Token older than 5 minute
        $formatted = Carbon::now()->subMinutes(5)->toDateTimeString();
        PasswordReset::where('created_at', '<=', $formatted)->delete();

        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response([
                'message' => $validator->errors()->first(),
                'status' => 'failed'
            ], 422);
        }

        $passwordreset = PasswordReset::where('token', $token)->first();

        if (!$passwordreset) {
            return response([
                'message' => 'Token is Invalid or Expired',
                'status' => 'failed'
            ], 404);
        }

        $user = User::where('email', $passwordreset->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        //! Delete the token after resetting password
        PasswordReset::where('email', $user->email)->delete();

        return response([
            'message' => 'Password Reset Success',
            'status' => 'success'
        ], 200);
    }
}
