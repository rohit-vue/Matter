<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate(['role' => 'required|string']);

        $user->syncRoles($request->role);

        return response()->json(['message' => 'Role updated successfully.']);
    }
}
