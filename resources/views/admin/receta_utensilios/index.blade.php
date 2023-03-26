@extends('adminlte::page')

@section('title')
Utensilios de {{ucwords($receta->nombre)}}
@stop
@section('plugins.Sweetalert2',true)
@section('content_header')
    
@stop

@section('content')
    <div class="card">
        <div class="card-header" style="display: flex;align-items: center;">                
            <a href="{{ route('admin.recetas.index')}}" class="btn btn-success float-left" title="Volver"><i class="fa fa-arrow-left"></i></a>
            <h1>Utensilios de {{ucwords($receta->nombre)}}</h1>                
        </div>
        <div class="card-body">         
            <a href="{{ route('admin.receta_utensilios.create',$receta)}}" class="btn btn-success float-left" title="NUEVO"><i class="fa fa-plus"></i></a>
            <div class="table-responsive">
                <table class="table table-sm table-bordered mx-auto">
                    <thead class="bg-success">
                    <tr>
                        <th style="width:4rem;max-width:4rem"></th>
                        <th style="width:4rem;max-width:4rem"></th>                        
                        <th scope="col">Utensilio</th>
                        <th scope="col">Descripcion</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($receta_utensilios as $receta_utensilio)
                            <tr>
                                <td>
                                    <a class="btn" href="{{ route('admin.receta_utensilios.edit',$receta_utensilio)}}" title="Editar"><i class="fas fa-edit"></i></a>
                                </td>                                
                                <td>
                                    <form id="myform{{$receta_utensilio->id}}" class="formulario_delete" action="{{ route('admin.receta_utensilios.destroy',$receta_utensilio)}}" method="post">                                                
                                        <button type="submit" class="btn" title="Eliminar"><i class="fas fa-trash"></i></button>
                                        <input type="hidden" name="_method" value="delete" />
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>                                
                                <td>{{$receta_utensilio->utensilio->nombre}}</td>                                
                                <td>{{$receta_utensilio->descripcion}}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4">SIN DATOS QUE MOSTRAR</td></tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
            {{$receta_utensilios->links()}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        
        $(".formulario_delete").submit(function(e){
            console.log("entra");
            e.preventDefault();
            Swal.fire({
                title: 'Seguro que desea eliminarlo?',
                text: "No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borralo!'
                }).then((result) => {
                    console.log(result.value);
                    if(result.value){
                        this.submit();
                    }                  
                })
        });
        @if (session('toast_success'))
        Swal.fire({
            type: 'success',
            text: '{!! session('toast_success') !!}',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            })            
        @endif
    </script>
    
@stop