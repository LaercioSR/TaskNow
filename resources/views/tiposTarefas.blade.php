@extends('layouts.app')

@section('title', 'Tipos de Tarefas')

@section('content')
    <div class="container content-tasknow">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br/>
                <br/>
                <h1>Tipos de Tarefas</h1>


                <table class="table table-light">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" colspan="2">Nome</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($tiposTarefasUser) == 0)
                        <tr>
                            <td>Você não possui tipos taferas cadastradas</td>
                        </tr>
                    @else
                        @foreach($tiposTarefasUser as $tipoTarefa)
                            <tr>
                                <td>{{$tipoTarefa->descricao}}</td>
                                <td>
                                    <form action = "{{route('tipotarefa.destroy', $tipoTarefa->id)}}" method = "POST">
                                        @csrf
                                        <a class = "btn" href="{{route('tipotarefa.edit', $tipoTarefa->id)}}"><img src="{{ asset('imagens/edit.png') }}" title="Editar"></a>
                                        @method('DELETE')
                                        <button type = "submit" class = "btn btn-link"><img src="{{ asset('imagens/delete.png') }}" title="Excluir"></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <a class = "btn" href="{{route('tipotarefa.create')}}"><img src="{{ asset('imagens/mais.png') }}" class="button-mais"/></a>
@endsection