<?php

namespace App\Http\Controllers;

use App\User;
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
        return response()->json(['success' => 'Removido com sucesso'])->getStatusCode(200);
    }

    /**
     * Retornas as mentorias relacionadas ao usuário logado
     * @return \Illuminate\Http\JsonResponse
     */
    public function showMonitorias(Request $request)
    {
        $id = Auth::user()->getAuthIdentifier();
        $query = Monitoria::with(['monitor', 'disciplina'])->where('monitor_id', $id);

        if ($request->novas) {
            $query->whereAceita(null);
        }

        return response()->json($query->get());
    }

    /**
     * Aluno solicita uma monitoria de um monitor "oculto"
     * @param $idDisciplina
     */
    public function solicitarMonitoria(Request $request)
    {
        $users = User::whereHas('ensinadas', function ($query) use ($request) {
            $query->whereId($request->id);
        })->where('id', '!=', Auth::user()->id)->get();

        if (!$users->count()) {
            return response()->json(['fail' => 'Nenhum usuário está ensinando esta disciplina.'], 404);
        }

        $monitoria = new Monitoria();
        $monitoria->monitor_id = $users->random()->id;
        $monitoria->monitorado_id = Auth::user()->id;
        $monitoria->disciplina_id = $request->id;
        $monitoria->save();
        return response()-json(['success' => 'Pedido de monitoria enviado'], 200);
    }

}
