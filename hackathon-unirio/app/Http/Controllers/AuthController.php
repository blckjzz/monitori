<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            $token = JWTAuth::attempt($credentials);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Erro na geração de token'], 500);
        }
        if (!$token) {
            return response()->json(['error' => 'Login inválido'], 401);
        }
        return response()->json(compact('token'));
    }
}
