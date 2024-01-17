<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'email' => 'The provided credentials do not match our records.',
            ], 402);
        }

        $user = Auth::user();
        $user->roles;
        $user->permissions;
        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return response()->json([
            'user' => $user,
            'token' => $accessToken
        ]);
    }

    public function profile()
    {
        $user = Auth::user();
        return response()->json(['user' => $user]);
    }

    public function editprofile(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $user = Auth::user();
        $user->update($request->all());

        return response()->json([
            'message' => 'success to update job category',
            'user' => $user
        ], 201);
    }
}
