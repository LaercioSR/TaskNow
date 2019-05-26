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
                                <label for="password" class="col-md-4 col-form-label text-md-right @error('password') is-invalid @enderror">{{ __('Senha') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @error('password')
                                        <div class=" alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="passwordconfirmed" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                                <div class="col-md-6">
                                    <input id="passwordconfirmed" type="password" class="form-control" name="password_confirmation" required>
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

