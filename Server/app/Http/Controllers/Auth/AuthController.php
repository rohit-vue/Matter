<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function showRegistrationForm(Request $request)
    {
        $token = $request->query('token');
        $role = $request->query('role');

        return view('auth.register', compact('token', 'role'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
        ]);

        $invitation = Invitation::where('token', $request->token)->firstOrFail();

        if ($invitation->role !== $request->role || $invitation->email !== $request->email) {
            return response()->json(['message' => 'Invalid invitation data.'], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $invitation->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($invitation->role);

        $invitation->delete();

        return response()->json(['message' => 'Registration successful.'], 201);
    }
}
