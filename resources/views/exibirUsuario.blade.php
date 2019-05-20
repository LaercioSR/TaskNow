@extends('layouts.app')

@section('title', $usuario->nome)

@section('content')
    <div class="container content-tasknow">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br/>
                <br/>
                <table class="table table-light">
                    <thead class="thead-light">
                    <tr>

                        <th scope="col" colspan="1">
                            <h3 id="nome" class="col-md-5 ">{{ $usuario->nome }}</h3>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <form>
                                <td>
                                    <div class="row">
                                        <label class="label-descricao col-md-1" for="sexo">Sexo: </label>
                                        @if($usuario->sexo == 0)
                                            <p id="sexo" class="col-md-3">Masculino</p>
                                        @else
                                            <p id="sexo" class="col-md-3">Feminino</p>
                                        @endif
                                        <label class="label-descricao col-md-3" for="datanascimento">Data de Nascimento: </label>
                                        <p id="datanascimento" class="col-md-5">{{ $usuario->data_nascimento }}</p>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container content-tasknow">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br/>
                <br/>
                <h1>Tarefas</h1>

                <table class="table table-light">
                    <thead class="thead-light">
                    <tr>

                        <th scope="col" colspan="2">Tarefa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tarefasPublicasUser as $tarefa)
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
                                        <a class="badge badge-light" href="/"><p id="usuario" class="col-md-10">{{ $tarefa->buscarUsuario() }}</p></a>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-link"href="/tarefa/{{ $tarefa->id }}/copiar">
                                        <img src="{{ asset('imagens/copy.png') }}">
                                    </a>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
