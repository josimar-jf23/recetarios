@extends('adminlte::page')

@section('title', 'Recetas')

@section('plugins.Sweetalert2',true)
@section('content_header')
    
@stop

@section('content')
    <div class="card">
        <div class="card-header">                
            <table style="width: 100%;border:none;">
                <tr>
                    <td style="width: 33.33%"></td>
                    <td style="width: 33.33%"></td>
                    <td style="width: 33.33%"></td>
                </tr>
                <tr>
                    <td>
                        <h1>Recetas</h1>
                        
                    </td>  
                    <td colspan="2">
                        <div class="form-inline float-right">                                
                            {{--  <div class="form-group">  
                                <label for="f_search">Buscar: </label>                                  
                                <input id="f_search" name="f_search" type="text" class="form-control " placeholder="Ingrese publicacion"></td>
                            </div>                                  --}}
                        </div>
                    </td>
                    <td></td>
                    
                </tr>
            </table>                
        </div>
        <div class="card-body">
            <a href="{{ route('admin.recetas.create')}}" class="btn btn-success float-left" title="NUEVO"><i class="fa fa-plus"></i></a>
            <div class="table-responsive">
                <table class="table table-sm table-bordered mx-auto">
                    <thead class="bg-success">
                    <tr>
                        <th style="width:4rem;max-width:4rem"></th>
                        <th style="width:4rem;max-width:4rem"></th>                        
                        <th scope="col">Tipo</th>
                        <th scope="col">Receta</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Indicaciones</th>
                        <th scope="col">Detalles</th>
                        <th scope="col">Utensilios</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($recetas as $receta)
                            <tr>
                                <td>
                                    <a class="btn" href="{{ route('admin.recetas.edit',$receta)}}" title="Editar"><i class="fas fa-edit"></i></a>
                                </td>                                
                                <td>
                                    <form id="myform{{$receta->id}}" class="formulario_delete" action="{{ route('admin.recetas.destroy',$receta)}}" method="post">                                                
                                        <button type="submit" class="btn" title="Eliminar"><i class="fas fa-trash"></i></button>
                                        <input type="hidden" name="_method" value="delete" />
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>                                
                                <td>{{$receta->receta_tipo->nombre}}</td>
                                <td>{{$receta->nombre}}</td>
                                <td>{{$receta->descripcion}}</td>
                                <td>{{$receta->indicaciones}}</td>
                                <td>
                                    <a class="btn" href="{{ route('admin.receta_detalles.index',$receta)}}" title="Detalles de la receta"><i class="fas fa-book"></i></a>
                                </td>
                                <td>
                                    <a class="btn" onclick="return false;" title="Utensilios de la receta"><i class="fas fa-book"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            {{$recetas->links()}}
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