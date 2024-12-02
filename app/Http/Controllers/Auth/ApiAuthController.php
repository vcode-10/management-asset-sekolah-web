<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->api_token = Str::random(60);
            $user->save();

            return response()->json([
                'status' => 'success',
                'api_token' => $user->api_token,
                'name' => $user->name,
                'email' => $user->email,
            ]);
        }

        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'message' => 'Logout successful'
        ]);
    }
}
