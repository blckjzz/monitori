<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplina;
use Illuminate\Support\Facades\Auth;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Disciplina::query();

        if ($request->has('limit')) {
            $query->take('limit');
        }

        return response()->json($query->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        # API... Não existem formulários!
        return response()->setStatusCode(501);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Disciplina::create($request->all());
        return response()->json(['success' => 'Disciplina criada com sucesso'])->getStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Disciplina::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $disciplina = Disciplina::findOrFail($id);
        $disciplina->fill($request->all());
        $disciplina->save();
        return response()->json(['success' => 'Disciplina atualizada com sucesso!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Disciplina::destroy($id);
        return response()->json(['success' => 'Disciplina deletada com sucesso'])->setStatusCode(200);
    }
    
    public function teach($id)
    {
        /** @var \App\User $user */
        $user = Auth::user();
        $user->ensinadas()->attach($id);
        return response()->json(['success' => 'Você está disponivel para dar aula desta disciplina'])->setStatusCode(200);
    }


    public function unteach($id)
    {
        /** @var \App\User $user */
        $user = Auth::user();
        $user->ensinadas()->detach($id);
        return response()->json(['success' => 'Você não está mais disponivel para dar aula desta disciplina'])->setStatusCode(200);
    }
}
