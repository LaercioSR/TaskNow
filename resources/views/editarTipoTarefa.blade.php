@extends('layouts.app')

@section('title', 'Criar Tipo de Tarefa')

@section('content')
    <div class="container content-tasknow">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action = "{{route('tipotarefa.update', $tipoTarefa)}}" method = "POST">
                    @csrf
                    @method('PUT')
                    <div class = "form-group">
                        <div class="titulo centralizar">
                            <p class="titulo-texto">Editar Tipo de Categoria</p>
                        </div>
                        <label for="descricao" class="pos-titulo descricao">Nome: </label>
                        <input type = "text" class = "form-control" id="nome" name="descricao" value="{{$tipoTarefa->descricao}}">
                        <br>
                        <button class = "btn btn-primary centralizar" type = "submit">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection