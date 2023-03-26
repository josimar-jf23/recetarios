@extends('adminlte::page')

@section('title', 'Cambiar Constraseña')

@section('content_header')
    
@stop

@section('content')
<div class="row justify-content-center">  
    <div class="card" style="width: 30rem;">
        <div class="card-header">
            <h1>Cambiar Contraseña</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.change_password.update') }}" autocomplete="false">
                <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                <div class="form-group">
                    <label for="password" class="col col-form-label text-md-left">Contraseña</label>
                    <div class="col">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="col col-form-label text-md-left">Confirmar Contraseña</label>
                    <div class="col">
                        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            Cambiar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop