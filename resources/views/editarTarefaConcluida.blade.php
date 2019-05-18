@extends('layouts.app')

@section('title', 'Editar Tarefa')

@section('content')
    <div class="container content-tasknow">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action = "{{route('tarefa.update', $tarefa)}}" method = "POST" class="" id="form-tarefa">
                    @method('PUT')
                    @csrf
                    <div class="titulo centralizar">
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <p class="titulo-texto">Editar Tarefa</p>
                    </div>
                    <br/>
                    <br/>
                    <div class = "form-group">
                        <label for="titulo" class="pos-titulo">Título</label>
                        <input type = "text" class = "form-control" id="titulo" name="titulo" value="{{ $tarefa->titulo }}" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tipoTarefa">Tipo de Tarefa</label>
                            <select id="tipoTarefa" class="form-control" name="tipoTarefa" required>
                                @foreach($tiposTarefasUser as $tipoTarefa)
                                    @if($tipoTarefa->id == $tarefa->id_tipo)
                                        <option value="{{$tipoTarefa->id}}" selected>{{$tipoTarefa->descricao}}</option>
                                    @else
                                        <option value="{{$tipoTarefa->id}}">{{$tipoTarefa->descricao}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group col-md-3">
                            <label for="privacidade">Privacidade</label><br/>
                            <label for="privacidade">público</label>
                            <input type="range" class="range-tasknow" min=0 max=1 id="privacidade" name="privacidade" value="{{ $tarefa->privacidade }}">
                            <label for="privacidade">privado</label>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="status">Status</label><br/>
                            <label for="status">pendente</label>
                            <input type="range" class="range-tasknow" min=0 max=1 id="status" name="status" value="{{ $tarefa->status }}">
                            <label for="status">concluído</label>
                        </div>
                    </div>

                    <div class = "form-group">
                        <label for="descricao">Descrição</label>
                        <textarea form="form-tarefa" class = "form-control" id="descricao" name="descricao" rows="5" maxlength="450" >{{ $tarefa->descricao }}</textarea>

                    </div>

                    <br/>
                    <button class = "btn btn-tasknow centralizar" type = "submit">Salvar</button>
                </form>
            </div>
        </div>
    </div>


@endsection