<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Monitoria;
use Illuminate\Support\Facades\Auth;

class MonitoriaController extends Controller
{
    use SoftDeletes;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Monitoria::query();

        if ($request->has('limit')) {
            $query->take($query->limit);
        }

        return response()->json($query->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # API... Não existem formulários!
        return response()->setStatusCode(501);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Monitoria::create($request->all());
        return response()->json(['success' => 'Monitoria criada com sucesso'])->getStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Monitoria::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        # API... Não existem formulários!
        return response()->setStatusCode(501);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $monitoria = Monitoria::findOrFail($id);
        $monitoria->fill($request->all());
        $monitoria->save();
        return response()->json(['success' => 'Monitoria atualizada com sucesso!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $monitoria = Monitoria::find($id);
        $monitoria->delete();
        return response()->json(['success' => 'Removido com sucesso'])->getStatusCode(201);
    }

    /**
     * Retornas as mentorias relacionadas ao usuário logado
     * @return \Illuminate\Http\JsonResponse
     */
    public function showMonitorias()
    {
        $id = Auth::user()->getAuthIdentifier();
        //adicionar clausula para mostrar apenas que não foram
        // finalizadas ou tratar isso na view de acordo com o param
        $respose = Monitoria::where('monitor_id', $id)->get();
        return response()->json($respose);
    }


    /**
     * Aluno solicita uma monitoria de um monitor "oculto"
     * @param $idDisciplina
     */
    public function solicitarMonitoria(Request $request){

        //puxar alguém com interesse em uma disciplina que foi passada no request
        Monitoria::create($request->all());

        return response()->json($request->all());
    }

}
