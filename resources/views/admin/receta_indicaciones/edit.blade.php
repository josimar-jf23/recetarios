@extends('adminlte::page')

@section('title')
Editar Indicacion de {{ ucwords($receta->nombre ) }}
@stop

@section('plugins.Select2', true)

@section('content_header')
@stop

@section('content')
<div class="row justify-content-center">       
    <div class="card" style="width: 50em;">
        <card-header><h1>Editar Indicacion de {{ ucwords($receta->nombre ) }}</h1></card-header>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.receta_indicaciones.update',$receta_indicacion) }}">
                {{ method_field('PUT') }}
                <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">                
                <div class="form-group">
                    <label for="indicacion" class="col col-form-label text-md-left">Indicacion</label>
                    <div class="col">
                        <input id="indicacion" type="text" class="form-control @error('indicacion') is-invalid @enderror" name="indicacion" value="{{ $errors->all() ? old('indicacion') : $receta_indicacion->indicacion }}" required>
                        @error('indicacion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="orden" class="col col-form-label text-md-left">Orden<span style="color:red">*</span></label>
                    <div class="col">
                        <input id="orden" type="text" class="form-control @error('orden') is-invalid @enderror" name="orden" 
                        value="{{ $errors->all() ? old('orden') : $receta_indicacion->orden }}">
                        @error('orden')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group" style="display:none;">
                    <div class="col">
                        <input id="receta_id" type="text" class="form-control" name="receta_id" value="{{ $errors->all() ? old('receta_id') : $receta->id }}">
                    </div>                    
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            Guardar
                        </button>
                        <a href="{{ route('admin.receta_indicaciones.index',$receta)}}" class="btn btn-danger">Cancelar</a>
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
    <script>         
    $(function() {
        $('.input-select2').select2({ 
            minimumResultsForSearch: 3,
            theme: "bootstrap4"
        });
    });
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
    </script>
@stop