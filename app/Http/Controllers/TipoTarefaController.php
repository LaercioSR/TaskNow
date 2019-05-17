<?php

namespace App\Http\Controllers;

use App\TipoTarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipoTarefaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposTarefas = TipoTarefa::all();
        $tiposTarefasUser = [];

        foreach($tiposTarefas as $tipoTarefa) {
            if($tipoTarefa->id_usuario == Auth::user()->id) {
                $tiposTarefasUser[] = $tipoTarefa;
            }
        }

        return view('tiposTarefas', compact('tiposTarefasUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criarTipoTarefa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoTarefa = new TipoTarefa();
        $tipoTarefa->id_usuario = Auth::user()->id;
        $tipoTarefa->descricao = $request->input("descricao");
        $tipoTarefa->save();

        return redirect()->route('tipotarefa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoTarefa  $tipoTarefa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoTarefa = TipoTarefa::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoTarefa  $tipoTarefa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoTarefa = TipoTarefa::findOrFail($id);
        return view('editarTipoTarefa', compact('tipoTarefa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoTarefa  $tipoTarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipoTarefa = TipoTarefa::findOrFail($id);

        $tipoTarefa->descricao = $request->input("descricao");
        $tipoTarefa->save();

        return redirect()->route('tipotarefa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoTarefa  $tipoTarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoTarefa = TipoTarefa::findOrFail($id);
        $tipoTarefa->delete();

        return redirect()->route('tipotarefa.index');
    }
}
