<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Monitoria;

class MonitoriaController extends Controller
{
    use SoftDeletes;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitorias = Monitoria::all();
        return response()->json($monitorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        return response()->json(['success' => 'Criado'])->getStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $monitoria = Monitoria::find($id);
        if ($monitoria == null) {
            return response()->setStatusCode(404);
        }
        return response()->json($monitoria);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        if ($monitoria == null) {
            return response()->setStatusCode(404);
        }
        $monitoria->fill($request->all());
        $monitoria->save();

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
}
