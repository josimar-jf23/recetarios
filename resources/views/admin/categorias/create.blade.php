@extends('adminlte::page')

@section('title', 'Nueva Categoria')

@section('content_header')
@stop

@section('content')
<div class="row justify-content-center">       
    <div class="card" style="width: 50em;">
        <card-header><h1>Nueva Categoria</h1></card-header>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.categorias.store') }}" autocomplete="false" enctype="multipart/form-data">
                <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                <div class="form-group">
                    <label for="nombre" class="col col-form-label text-md-left">Nombre<span style="color:red">*</span></label>
                    <div class="col">
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}">
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col col-form-label text-md-left">Descripcion<span style="color:red">*</span></label>
                    <div class="col">
                        <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}">
                        @error('descripcion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="orden" class="col col-form-label text-md-left">Orden</label>
                    <div class="col">
                        <input id="orden" type="text" class="form-control @error('orden') is-invalid @enderror" name="orden" value="{{ old('orden') }}">
                        @error('orden')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <div class="col">                                                 
                        <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*">
                        @error('imagen')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror                        
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            Agregar
                        </button>
                        <a href="{{ route('admin.categorias.index')}}" class="btn btn-danger">Cancelar</a>
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