<?php

namespace App\Http\Controllers;

use App\Tarefa;
use App\TipoTarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarefaController extends Controller
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
        $tarefas = Tarefa::all();
        $tarefasUser = [];

        foreach($tarefas as $tarefa) {
            if($tarefa->id_usuario == Auth::user()->id && $tarefa->status == 0) {
                $tarefasUser[] = $tarefa;
            }
        }

        return view('home', compact('tarefasUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposTarefas = TipoTarefa::all();
        $tiposTarefasUser = [];

        foreach($tiposTarefas as $tipoTarefa) {
            if($tipoTarefa->id_usuario == Auth::user()->id) {
                $tiposTarefasUser[] = $tipoTarefa;
            }
        }

        return view('criarTarefa', compact('tiposTarefasUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarefa = new Tarefa();
        $tarefa->id_usuario = Auth::user()->id;
        $tarefa->id_tipo = $request->input('tipoTarefa');
        $tarefa->titulo = $request->input('titulo');
        $tarefa->privacidade = $request->input('privacidade');
        $tarefa->descricao = $request->input('descricao');
        $tarefa->status = 0;
        $tarefa->save();

        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tiposTarefas = TipoTarefa::all();
        $tiposTarefasUser = [];

        foreach($tiposTarefas as $tipoTarefa) {
            if($tipoTarefa->id_usuario == Auth::user()->id) {
                $tiposTarefasUser[] = $tipoTarefa;
            }
        }

        return view('editarTarefa', compact('tarefa'), compact('tiposTarefasUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $tarefa->id_tipo = $request->input('tipoTarefa');
        $tarefa->titulo = $request->input('titulo');
        $tarefa->privacidade = $request->input('privacidade');
        $tarefa->descricao = $request->input('descricao');
        $tarefa->save();

        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();

        return redirect('/');
    }

    public function concluir($id) {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->marcarComoConcluida();

        return redirect('/');
    }
}
