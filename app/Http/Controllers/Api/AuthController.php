<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $cred = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required','string'],
        ]);

        $user = User::where('email', $cred['email'])->first();

        if (! $user || ! Hash::check($cred['password'], $user->password)) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }

        /** @var \App\Models\User $user */
        $user = $request->user();

        // Puedes usar abilities/scopes si lo necesitas
        $token = $user->createToken('api')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user'  => [
                'id' => $user->id,
                'email' => $user->email,
                'nombre' => $user->nombre,
                'apellido' => $user->apellido,
            ],
        ]);
    }

    public function logout(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = $request->user();
        // Revoca solo el token actual:
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Sesión cerrada']);
    }
}
