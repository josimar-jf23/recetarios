@extends('adminlte::page')

@section('title', 'Editar Receta')

@section('plugins.Select2', true)

@section('content_header')
@stop

@section('content')
<div class="row justify-content-center">       
    <div class="card" style="width: 50em;">
        <card-header><h1>Editar Receta</h1></card-header>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.recetas.update',$receta) }}" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                <div class="form-group">
                    <label for="receta_tipo_id" class="col col-form-label text-md-left">Receta Tipo<span style="color:red">*</span></label>
                    <div class="col">                        
                        <select class="input-select2 form-control" name="receta_tipo_id" id="receta_tipo_id" style="width: 100%;">
                            <option value="">Seleccione</option>
                            @foreach ($receta_tipos as $receta_tipo)
                                <option 
                                    value="{{$receta_tipo->id}}" 
                                    @if($errors->all())
                                        {{((old('receta_tipo_id')==$receta_tipo->id)?"selected":"")}} 
                                    @else 
                                        {{(($receta->receta_tipo->id == $receta_tipo->id)?"selected":"")}}  
                                    @endif 
                                >{{$receta_tipo->nombre}}</option>
                            @endforeach
                        </select>
                        @error('receta_tipo_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="nombre" class="col col-form-label text-md-left">Nombre<span style="color:red">*</span></label>
                    <div class="col">
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $errors->all() ? old('nombre') : $receta->nombre }}">
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col col-form-label text-md-left">Descripcion</label>
                    <div class="col">
                        <input 
                            id="descripcion" 
                            type="text" 
                            class="form-control @error('descripcion') is-invalid @enderror" 
                            name="descripcion" 
                            value="{{ $errors->all() ? old('descripcion') : $receta->descripcion }}"                            
                        >
                        @error('descripcion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="indicaciones" class="col col-form-label text-md-left">Indicaciones</label>
                    <div class="col">
                        <input 
                            id="indicaciones" 
                            type="text" 
                            class="form-control @error('indicaciones') is-invalid @enderror" 
                            name="indicaciones" 
                            value="{{ $errors->all() ? old('indicaciones') : $receta->indicaciones }}"                            
                        >
                        @error('indicaciones')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="estado" class="col col-form-label text-md-left">Publicar<span style="color:red">*</span></label>
                    <div class="col">                        
                        <select class="input-select2 form-control" name="estado" id="estado" style="width: 100%;">
                            <option value="">Seleccione</option>
                            <option value="1" {{ ($errors->all())? ( ( old('estado')==$receta->estado)?"selected":"") : (($receta->estado == '1')?"selected":"") }} >Si</option>
                            <option value="2" {{ ($errors->all())? ((old('estado')==$receta->estado)?"selected":"") : (($receta->estado == '2')?"selected":"") }} >No</option>
                        </select>
                        @error('estado')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="row justify-content-center">
                    @isset($receta->image)
                    <div class="button-container">
                        <img class="img-thumbnail" alt="200x200" src="{{ Storage::url($receta->image->url) }}" data-holder-rendered="true" style="width: 100px; height: 100px;" alt="Sin imagen">
                        <a id="btn_borrar" onclick="borrar_imagen();return false;" alt=“Borrar”>X</a>
                        <span id="txt_borrar" class="ocultar">GUARDAR PARA ELIMINAR IMAGEN</span>
                    </div>                       
                    @endisset
                    <input type="hidden" id="remover_imagen" name="remover_imagen" value="0"> 
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
                            Guardar
                        </button>
                        <a href="{{ route('admin.recetas.index')}}" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .button-container{
            display:inline-block;
            position:relative;
        }
        
        .button-container #btn_borrar{
            position: absolute;
            right: 0px;
            background-color: #000;
            border-radius: 50%;
            color: white;
            text-transform: uppercase;
            padding: 4px;
            opacity: 0.5;
            font-size: 9px;
            cursor: pointer;
        }
        .button-container #txt_borrar{
            position: absolute;
            left: 0px;
            bottom: 0px;
            background-color: #000;
            border-radius: 5%;
            color: white;
            text-transform: uppercase;
            padding: 4px;
            opacity: 0.5;
            font-size: 9px;
        }
        .ocultar{
            display: none;
        }
        .tox-promotion{
            display: none;
        }
    </style>
@stop

@section('js')
   
    <script>         
        $(function() {
            $('.input-select2').select2({ 
                minimumResultsForSearch: 3,
                theme: "bootstrap4"
            });
        });
        function borrar_imagen(){
            document.getElementById("btn_borrar").classList.add('ocultar');
            document.getElementById("txt_borrar").classList.remove('ocultar');
            document.getElementById("remover_imagen").value='1';
        }
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>
@stop