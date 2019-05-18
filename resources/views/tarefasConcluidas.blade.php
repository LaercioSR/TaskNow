@extends('layouts.app')

@section('title', 'Tarefas Concluídas')

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
                <h1>Tarefas Concluídas</h1>

                <table class="table table-light">
                    <thead class="thead-light">
                    <tr>

                        <th scope="col" colspan="2">Tarefa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tarefasUser as $tarefa)
                        <tr>
                            <td>
                                <form>
                                    <div class="row">
                                        <label class="label-descricao col-md-1" for="titulo">Título: </label>
                                        <p id="titulo" class="col-md-4">{{ $tarefa->titulo }}</p>
                                        <label class="label-descricao col-md-2" for="concluido">Concluido: </label>
                                        <p id="concluido" class="col-md-5">{{ $tarefa->dataConclusao()}}</p>
                                    </div>

                                    <div class="row">
                                        <label class="label-descricao col-md-1" for="tipo">Tipo: </label>
                                        <p id="tipo" class="col-md-4">{{ $tarefa->buscarTipo() }}</p>

                                        <label class="label-descricao col-md-2" for="privacidade">Privacidade: </label>
                                        @if($tarefa->privacidade == 0)
                                            <p id="privacidade" class="col-md-5">Público</p>
                                        @else
                                            <p id="privacidade" class="col-md-5">Privado</p>
                                        @endif
                                    </div>

                                    <label class="label-descricao" for="descricao">Descrição: </label>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <textarea id="descricao" class = "form-control col-md-11" rows="5" cols="90" readonly>{{ $tarefa->descricao }}</textarea>
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
@endsection
