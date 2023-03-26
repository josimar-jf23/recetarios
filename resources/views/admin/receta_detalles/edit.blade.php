@extends('adminlte::page')

@section('title')
Editar Detalle de {{ ucwords($receta->nombre ) }}
@stop

@section('plugins.Select2', true)

@section('content_header')
@stop

@section('content')
<div class="row justify-content-center">       
    <div class="card" style="width: 50em;">
        <card-header><h1>Editar Detalle de {{ ucwords($receta->nombre ) }}</h1></card-header>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.receta_detalles.update',$receta_detalle) }}">
                {{ method_field('PUT') }}
                <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">                
                <div class="form-group">
                    <label for="ingrediente_id" class="col col-form-label text-md-left">Ingrediente<span style="color:red">*</span></label>
                    <div class="col">                        
                        <select class="input-select2 form-control" name="ingrediente_id" id="ingrediente_id" style="width: 100%;">
                            <option value="">Seleccione</option>
                            @foreach ($ingredientes as $ingrediente)
                                <option value="{{$ingrediente->id}}" 
                                    @if($errors->all())
                                        {{((old('ingrediente_id')==$ingrediente->id)?"selected":"")}} 
                                    @else 
                                        {{(($receta_detalle->ingrediente->id == $ingrediente->id)?"selected":"")}}  
                                    @endif
                                    >{{$ingrediente->nombre}}</option>
                            @endforeach
                        </select>
                        @error('ingrediente_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="cantidad" class="col col-form-label text-md-left">Cantidad<span style="color:red">*</span></label>
                    <div class="col">
                        <input id="cantidad" type="text" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" 
                        value="{{ $errors->all() ? old('cantidad') : $receta_detalle->cantidad }}">
                        @error('cantidad')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="unidad_medida_id" class="col col-form-label text-md-left">Unidad de Medida<span style="color:red">*</span></label>
                    <div class="col">                        
                        <select class="input-select2 form-control" name="unidad_medida_id" id="unidad_medida_id" style="width: 100%;">
                            <option value="">Seleccione</option>
                            @foreach ($unidad_medidas as $unidad_medida)
                                <option value="{{$unidad_medida->id}}"
                                    @if($errors->all())
                                        {{((old('unidad_medida_id')==$unidad_medida->id)?"selected":"")}} 
                                    @else 
                                        {{(($receta_detalle->unidad_medida->id == $unidad_medida->id)?"selected":"")}}  
                                    @endif
                                     >{{$unidad_medida->nombre}}</option>
                            @endforeach
                        </select>
                        @error('unidad_medida_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="adicional" class="col col-form-label text-md-left">Adicional</label>
                    <div class="col">
                        <input id="adicional" type="text" class="form-control @error('adicional') is-invalid @enderror" name="adicional" 
                        value="{{ $errors->all() ? old('adicional') : $receta_detalle->adicional }}">
                        @error('adicional')
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
                        <a href="{{ route('admin.receta_detalles.index',$receta)}}" class="btn btn-danger">Cancelar</a>
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