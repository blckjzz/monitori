<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * Login do Usuário
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('matricula', 'password');
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
