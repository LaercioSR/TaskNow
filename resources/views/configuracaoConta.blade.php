@extends('layouts.app')

@section('title', 'Configurações da Conta')

@section('content')
    <div class="container content-tasknow">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action = "{{ url('/usuario') }}" method = "POST" class="" id="form-tarefa">
                    @method('PUT')
                    @csrf
                    <div class="titulo centralizar">
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <p class="titulo-texto">Configuração de Conta</p>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <div class="form-group row">
                        <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                        <div class="col-md-6">
                            <input id="nome" type="text" class="form-control" name="nome" value="{{ $usuario->nome }}" required autocomplete="nome">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

                        <div class="col-md-6">
                            <select id="sexo" class="form-control" name="sexo">
                                <option value=0>Masculino</option>
                                <option value=1>Feminino</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="datanascimento" class="col-md-4 col-form-label text-md-right">{{ __('Data de Nascimento') }}</label>

                        <div class="col-md-6">
                            <input id="datanascimento" type="date" class="form-control" name="datanascimento" value="{{ $usuario->data_nascimento }}" required autocomplete="datanascimento" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                        <div class="col-md-6">
                            <input id="telefone" type="text" class="form-control" name="telefone" value="{{ $usuario->telefone }}" required autocomplete="telefone" maxlength="15" >
                        </div>
                    </div>

                    <br/>
                    <button class = "btn btn-tasknow centralizar" type = "submit">Salvar</button>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <form action = "{{ url('/usuario') }}" method = "POST">
                        @csrf
                        @method('DELETE')
                        <button type = "submit" class = "btn btn-tasknowdelete centralizar">Excluir Conta</button>
                    </form>
                </form>
            </div>
        </div>
    </div>


@endsection