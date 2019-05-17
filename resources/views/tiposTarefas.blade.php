@extends('layouts.app')

@section('title', 'Tipos de Tarefaa')

@section('content')
    <div class="container content-tasknow">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <table class="table table-striped table-bordered table-light">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tiposTarefasUser as $tipoTarefa)
                        <tr>
                            <td>{{$tipoTarefa->id}}</td>
                            <td>{{$tipoTarefa->descricao}}</td>
                            <td>
                                <form action = "{{route('tipotarefa.destroy', $tipoTarefa)}}" method = "POST">
                                    @csrf
                                    <a class = "btn btn-success" href="{{route('tipotarefa.edit', $tipoTarefa)}}">Editar</a>
                                    @method('DELETE')
                                    <button type = "submit" class = "btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection