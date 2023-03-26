@extends('adminlte::page')

@section('title')
Editar Utensilio Para {{ ucwords($receta->nombre) }}
@stop

@section('plugins.Select2', true)

@section('content_header')
@stop

@section('content')
<div class="row justify-content-center">       
    <div class="card" style="width: 50em;">
        <card-header><h1>Editar Utensilio Para {{ ucwords($receta->nombre) }}</h1></card-header>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.receta_utensilios.update',$receta_utensilio) }}">
                {{ method_field('PUT') }}
                <input name="_token" id="_token" value="{{ csrf_token() }}" type="hidden">                
                <div class="form-group">
                    <label for="utensilio_id" class="col col-form-label text-md-left">Utensilio<span style="color:red">*</span></label>
                    <div class="col">                        
                        <select class="input-select2 form-control" name="utensilio_id" id="utensilio_id" style="width: 100%;">
                            <option value="">Seleccione</option>
                            @foreach ($utensilios as $utensilio)
                                <option value="{{$utensilio->id}}" 
                                    @if($errors->all())
                                        {{((old('utensilio_id')==$utensilio->id)?"selected":"")}} 
                                    @else 
                                        {{(($receta_utensilio->utensilio->id == $utensilio->id)?"selected":"")}}  
                                    @endif
                                    >{{$utensilio->nombre}}</option>
                            @endforeach
                        </select>
                        @error('utensilio_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col col-form-label text-md-left">Descripcion</label>
                    <div class="col">
                        <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" 
                        value="{{ $errors->all() ? old('descripcion') : $receta_utensilio->descripcion }}">
                        @error('descripcion')
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
                        <a href="{{ route('admin.receta_utensilios.index',$receta)}}" class="btn btn-danger">Cancelar</a>
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