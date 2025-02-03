<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuarios;
use Laravel\Sanctum\PersonalAccessToken;

class LoginController extends Controller
{
    /**
     * Handle user login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'Clave' => 'required|string',
        ]);

        $usuario = Usuarios::where('Email', $request->Email)->first();

        if (!$usuario || !Hash::check($request->Clave, $usuario->Clave)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        // Crear un token para la sesión
        $token = $usuario->createToken('auth_token')->plainTextToken;

        return response()->json([
            'usuario' => $usuario,
            'token' => $token,
        ], 200);
    }

    /**
     * Handle user logout.
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Sesión cerrada exitosamente'], 200);
    }
}
