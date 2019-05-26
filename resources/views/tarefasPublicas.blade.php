@extends('layouts.app')

@section('title', 'Tarefas Públicas')

@section('content')
    <div class="container content-tasknow">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br/>
                <br/>
                <h1>Tarefas Públicas</h1>

                <table class="table table-light">
                    <thead class="thead-light">
                    <tr>

                        <th scope="col" colspan="2">Tarefa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($tarefasPublicas) == 0)
                        <tr>
                            <td>Não existe taferas públicas</td>
                        </tr>
                    @else
                        @foreach($tarefasPublicas as $tarefa)
                            <tr>
                                <form>
                                    <td>
                                        <div class="row">
                                            <label class="label-descricao col-md-1" for="titulo">Título: </label>
                                            <p id="titulo" class="col-md-5">{{ $tarefa->titulo }}</p>
                                            <label class="label-descricao col-md-1" for="tipo">Tipo: </label>
                                            <p id="tipo" class="col-md-5">{{ $tarefa->buscarTipo() }}</p>
                                        </div>

                                        <label class="label-descricao " for="descricao">Descrição: </label>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <textarea id="descricao" class = "form-control col-md-11" rows="5" cols="90" readonly>{{ $tarefa->descricao }}</textarea>
                                        </div>

                                        <div class="row">
                                            <br/>
                                        </div>
                                        <div class="row">
                                            <label class="label-descricao col-md-2" for="usuario">Usuário: </label>
                                            <a class="badge badge-light" href="/usuario/{{ $tarefa->id_usuario }}"><p id="usuario" class="col-md-10">{{ $tarefa->buscarUsuario() }}</p></a>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-link"href="/tarefa/{{ $tarefa->id }}/copiar">
                                            <img src="{{ asset('imagens/copy.png') }}" title="Copiar Tarefa">
                                        </a>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection