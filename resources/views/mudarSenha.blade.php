@extends('layouts.app')

@section('title', 'Mudar Senha')

@section('content')
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mudar Senha') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('usuario/mudarsenha') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="senhaatual" class="col-md-4 col-form-label text-md-right">{{ __('Senha Atual') }}</label>

                                <div class="col-md-6">
                                    <input id="senhaatual" type="password" class="form-control" name="senhaatual" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="senha" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                                <div class="col-md-6">
                                    <input id="senha" type="password" class="form-control" name="senha" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="senhaconfirmada" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                                <div class="col-md-6">
                                    <input id="senhaconfirmada" type="password" class="form-control" name="senhaconfirmada" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-tasknow">
                                        {{ __('Resetar Senha') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

