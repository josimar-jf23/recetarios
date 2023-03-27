@extends('adminlte::page')

@section('title', 'Editar Ingrediente')

@section('plugins.Select2', true)

@section('content_header')
@stop

@section('content')
<div class="row justify-content-center">       
    <div class="card" style="width: 50em;">
        <card-header><h1>Editar Ingrediente</h1></card-header>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.ingredientes.update',$ingrediente) }}" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">
                <div class="form-group">
                    <label for="nombre" class="col col-form-label text-md-left">Nombre<span style="color:red">*</span></label>
                    <div class="col">
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $errors->all() ? old('nombre') : $ingrediente->nombre }}">
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
                            value="{{ $errors->all() ? old('descripcion') : $ingrediente->descripcion }}"                            
                        >
                        @error('descripcion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                
                <div class="form-group">
                    <label for="categoria_id" class="col col-form-label text-md-left">Categoria<span style="color:red">*</span></label>
                    <div class="col">                        
                        <select class="input-select2 form-control" name="categoria_id" id="categoria_id" style="width: 100%;">
                            <option value="">Seleccione</option>
                            @foreach ($categorias as $categoria)
                                <option 
                                    value="{{$categoria->id}}" 
                                    @if($errors->all())
                                        {{((old('categoria_id')==$categoria->id)?"selected":"")}} 
                                    @else 
                                        {{(($ingrediente->categoria->id == $categoria->id)?"selected":"")}}  
                                    @endif 
                                >{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="row justify-content-center">
                    @isset($ingrediente->image)
                    <div class="button-container">
                        <img class="img-thumbnail" alt="200x200" src="{{ Storage::url($ingrediente->image->url) }}" data-holder-rendered="true" style="width: 100px; height: 100px;" alt="Sin imagen">
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
                        <a href="{{ route('admin.ingredientes.index')}}" class="btn btn-danger">Cancelar</a>
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