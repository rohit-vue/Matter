<?php
namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationMail;

class InvitationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'role' => 'required|string',
        ]);

        $token = Str::random(32);

        $invitation = Invitation::create([
            'email' => $request->email,
            'role' => $request->role,
            'token' => $token,
        ]);

        $link = url('/api/register') . '?token=' . $token . '&role=' . $request->role;

        // Send the invitation email
        Mail::to($request->email)->send(new InvitationMail($link));

        return response()->json(['message' => 'Invitation sent successfully.']);
    }
}
