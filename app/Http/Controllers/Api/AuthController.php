<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'string',
                'email' => 'string|email|unique:users',
                'password' => 'string|confirmed'
            ]
        );
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ], 201);
    }

    public function profile(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
        ], 200);
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'string|email',
                'password' => 'string'
            ]
        );

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'error' => 'Credenciales Invalidas'
            ], 401);
        }
        $user = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Incio de session Exitosa',
            'token' => $token,
            'user' => $user,
        ], 200);
    }


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Session cerrar correctamente '
        ], 200);
    }
}
