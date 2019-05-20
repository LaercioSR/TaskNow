<?php

namespace App\Http\Controllers;

use App\Tarefa;
use App\TipoTarefa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        $tarefas = Tarefa::all();
        $tarefasPublicasUser = [];

        foreach($tarefas as $tarefa) {
            if($tarefa->id_usuario == $usuario->id && $tarefa->privacidade == 0) {
                $tarefasPublicasUser[] = $tarefa;
            }
        }

        return view('exibirUsuario', compact('usuario'), compact('tarefasPublicasUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $usuario = Auth::user();
        return view('configuracaoConta', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $usuario = Auth::user();
        $usuario->nome = $request->input('nome');
        $usuario->sexo = $request->input('sexo');
        $usuario->data_nascimento = $request->input('datanascimento');
        $usuario->telefone = $request->input('telefone');
        $usuario->save();

        return redirect('/usuario/configuracoes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $usuario = Auth::user();
        $tarefas = Tarefa::all();

        foreach($tarefas as $tarefa) {
            if($tarefa->id_usuario == $usuario->id) {
                $tarefa->delete();
            }
        }

        $tipoTarefas = TipoTarefa::all();

        foreach($tipoTarefas as $tipoTarefa) {
            if($tipoTarefa->id_usuario == $usuario->id) {
                $tipoTarefa->forceDelete();
            }
        }

        $tipoTarefasDeletada = TipoTarefa::onlyTrashed()->get();

        foreach($tipoTarefasDeletada as $tipoTarefaDeletada) {
            if($tipoTarefaDeletada->id_usuario == $usuario->id) {
                $tipoTarefaDeletada->forceDelete();
            }
        }

        $usuario->delete();

        return redirect('/');
    }
}
