<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //TODO: Register a new user
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:2|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'privacyPolicies' => 'required|accepted',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => null,
        ]);

        //* Generate a verification token and save it to the user model
        $verificationToken = Str::random(60);
        $user->remember_token = $verificationToken;
        $user->save();

        //* Send the verification email
        Mail::to($user->email)->send(new VerifyEmail($user));

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
        ], 201);
    }

    //TODO: Login a user
    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email|max:60",
            "password" => "required|string|min:3"
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid email or password.'
            ], 401);
        }
        if (!$token = auth()->attempt($validator->validated())) {         //* NEW TOKEN CREATING
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorised'
            ], 401);
        }
        $user = auth()->user();
        unset($user->password);
        return response()->json([
            'status' => 'success',
            'access_token' => $token,
            'user' => $user,
            'message' => 'Logged user data'
        ]);
    }

    //TODO: Refreshing the token
    // public function refresh()
    // {
    //     return $this->respondwithToken(auth()->refresh());
    // }

    //TODO: invalidate the current token and unset the authenticated user.
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User logged out']);
    }

    public function verifyEmail($token)
    {
        $user = User::where('remember_token', $token)->firstOrFail();

        if ($user->email_verified_at == null) {
            $user->email_verified_at = now();
            $user->remember_token = null;
            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Email verified successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Email already verified.'
            ]);
        }
    }
}
