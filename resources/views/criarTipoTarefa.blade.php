@extends('layouts.app')

@section('title', 'Criar Tipo de Tarefa')

@section('content')
    <div class="container content-tasknow">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action = "{{route('tipotarefa.store')}}" method = "POST">
                    @csrf
                    <div class = "form-group">
                        <div class="titulo centralizar">
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <p class="titulo-texto">Cadastro de Tipo de Tarefa</p>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <label for="descricao" class="pos-titulo descricao">Nome: </label>
                        <input type = "text" class = "form-control" id="nome" name="descricao">
                        <br>
                        <br>
                        <button class = "btn btn-primary centralizar" type = "submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection