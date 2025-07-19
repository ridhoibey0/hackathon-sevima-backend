<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response(
                [
                    'success' => false,
                    'message' => 'This credential does not match our records',
                ],
                404,
            );
        }
        $token = $user->createToken('tokenApi')->plainTextToken;

        $response = [
            'success' => true,
            'data' => $user,
            'token' => $token,
            'message' => 'Login Success',
        ];
        return response($response, 201);
    }
}
