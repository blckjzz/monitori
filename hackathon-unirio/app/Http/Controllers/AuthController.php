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
        # Recupera o aluno da API
        $client = new \GuzzleHttp\Client();
        $aluno_api = $client->get(config('hackathon.url') . '/V_ALUNOS', [
            'query' => [
                'API_KEY' => config('hackathon.token'),
                'matr_aluno' => $request->matr_aluno
            ]
        ]);

        # Caso o aluno da API exista, tentar autentica-lo no banoo
        if ($aluno_api) {
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

        # Aluno da API não existe, impossível logar.
        return response()->json(['error' => 'Matrícula não existente'], 401);
    }

    /**
     * Recebe como parametros da requisição os dados de cadastro de um usuário,
     * verifica se este usuário existe na API, e o registra caso exista.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registrar(Request $request)
    {
        # Busca o aluno na API
        $client = new \GuzzleHttp\Client();
        $aluno_api = $client->get(config('hackathon.url') . '/V_ALUNOS', [
            'query' => [
                'API_KEY' => config('hackathon.token'),
                'matr_aluno' => $request->matr_aluno
            ]
        ]);

        # Aluno existe, registra-lo no banco
        if ($aluno_api) {
            $user = new \App\User($request->all());
            $user->save();
            return response()->json(['success' => 'Registrado com Sucesso'], 201);
        }

        # Aluno não existe, impossível registrar
        return response()->json(['error' => 'Matrícula não existente'], 401);
    }
}
