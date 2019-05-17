@extends('layouts.app')

@section('title', 'Criar Tarefa')

@section('content')

    <div class="container content-tasknow">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action = "{{route('tarefa.store')}}" method = "POST" class="" id="form-tarefa">
                    @csrf
                    <div class="titulo centralizar">
                        <p class="titulo-texto">Cadastro de Tarefa</p>
                    </div>
                    <div class = "form-group">
                        <label for="titulo" class="pos-titulo">Título</label>
                        <input type = "text" class = "form-control" id="titulo" name="titulo" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tipoTarefa">Tipo de Tarefa</label>
                            <select id="tipoTarefa" class="form-control" name="tipoTarefa" required>
                                @foreach($tiposTarefasUser as $tipoTarefa)
                                    <option value="{{$tipoTarefa->id}}">{{$tipoTarefa->descricao}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class = "form-group col-md-3">
                            <label for="dataconclusao">Data de Conclusão</label>
                            <input type = "date" class = "form-control" id="dataconclusao" name="dataconclusao" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="privacidade">Privacidade</label><br/>
                            <label for="privacidade">público</label>
                            <input type="range" class="range-tasknow" min=0 max=1 id="privacidade" name="privacidade">
                            <label for="privacidade">privado</label>
                        </div>
                    </div>

                    <div class = "form-group">
                        <label for="descricao">Descrição</label>
                        <textarea form="form-tarefa" class = "form-control" id="descricao" name="descricao" rows="5" maxlength="450"></textarea>

                    </div>

                    <br/>
                    <button class = "btn btn-primary centralizar" type = "submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>


@endsection