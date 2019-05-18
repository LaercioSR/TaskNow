@extends('layouts.app')

@section('title', 'Tipos de Tarefas')

@section('content')
    <div class="container content-tasknow">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br/>
                <br/>
                <h1>Tipos de Tarefas</h1>


                <table class="table table-striped table-light">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col" colspan="2">Nome</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tiposTarefasUser as $tipoTarefa)
                        <tr>
                            <td>{{$tipoTarefa->id}}</td>
                            <td>{{$tipoTarefa->descricao}}</td>
                            <td>
                                <form action = "{{route('tipotarefa.destroy', $tipoTarefa->id)}}" method = "POST">
                                    @csrf
                                    <a class = "btn" href="{{route('tipotarefa.edit', $tipoTarefa->id)}}"><img src="{{ asset('imagens/edit.png') }}"></a>
                                    @method('DELETE')
                                    <button type = "submit" class = "btn btn-link"><img src="{{ asset('imagens/delete.png') }}"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <a class = "btn" href="{{route('tipotarefa.create')}}"><img src="{{ asset('imagens/mais.png') }}" class="button-mais"/></a>
@endsection