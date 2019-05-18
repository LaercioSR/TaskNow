@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')
    <script>
        @foreach($tarefasUser as $tarefa)
            function trocaCheckIn{{ $tarefa->id }}() {
                document.getElementById("image-check{{ $tarefa->id }}").src = "{{ asset('imagens/checked.png') }}";
            }

            function trocaCheck{{ $tarefa->id }}() {
                document.getElementById("image-check{{ $tarefa->id }}").src = "{{ asset('imagens/check_box.png') }}";
            }
        @endforeach
    </script>
    <div class="container content-tasknow">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br/>
                <br/>
                <h1>Tarefas Pendentes</h1>

                <table class="table table-light">
                    <thead class="thead-light">
                    <tr>

                        <th scope="col" colspan="3">Tarefa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tarefasUser as $tarefa)
                        <tr>
                            <td>
                                <a href="/tarefa/{{ $tarefa->id }}/concluir">
                                    <button class="btn btn-link">
                                        <img src="{{ asset('imagens/check_box.png') }}" id="image-check{{ $tarefa->id }}" onmouseover="trocaCheckIn{{ $tarefa->id }}()" onmouseout="trocaCheck{{ $tarefa->id }}()">
                                    </button>
                                </a>
                            </td>

                            <td>
                                <form>
                                    <div class="row">
                                        <label class="label-descricao col-md-1" for="titulo">Título: </label>
                                        <p id="titulo" class="col-md-11">{{ $tarefa->titulo }}</p>
                                    </div>

                                    <div class="row">
                                        <label class="label-descricao col-md-1" for="tipo">Tipo: </label>
                                        <p id="tipo" class="col-md-5">{{ $tarefa->buscarTipo() }}</p>

                                        <label class="label-descricao col-md-2" for="privacidade">Privacidade: </label>
                                        @if($tarefa->privacidade == 0)
                                            <p id="privacidade" class="col-md-4">Público</p>
                                        @else
                                            <p id="privacidade" class="col-md-4">Privado</p>
                                        @endif
                                    </div>

                                    <div class="row">
                                        <label class="label-descricao" for="descricao">Descrição: </label>
                                        <textarea id="descricao" rows="5" cols="90" readonly>{{ $tarefa->descricao }}</textarea>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <form action = "{{route('tarefa.destroy', $tarefa->id)}}" method = "POST">
                                    @csrf
                                    <a class = "btn" href="{{route('tarefa.edit', $tarefa->id)}}"><img src="{{ asset('imagens/edit.png') }}"></a>
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

    <a class = "btn" href="{{route('tarefa.create')}}"><img src="{{ asset('imagens/mais.png') }}" class="button-mais"/></a>
@endsection
