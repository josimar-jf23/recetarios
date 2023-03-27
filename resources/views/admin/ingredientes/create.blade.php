@extends('adminlte::page')

@section('title', 'Nuevo Ingrediente')

@section('plugins.Select2', true)

@section('content_header')
@stop

@section('content')
<div class="row justify-content-center">       
    <div class="card" style="width: 50em;">
        <card-header><h1>Nuevo Ingrediente</h1></card-header>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.ingredientes.store') }}" autocomplete="false" enctype="multipart/form-data">
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
                    <label for="descripcion" class="col col-form-label text-md-left">Descripcion</label>
                    <div class="col">
                        <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}">
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
                                <option value="{{$categoria->id}}" {{ (old('categoria_id')==$categoria->id)?"selected":"" }}>{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
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