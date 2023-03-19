@extends('adminlte::page')

@section('title', 'Categorias')

@section('plugins.Sweetalert2',true)
@section('content_header')
    <h1>Categorias</h1>
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
                        <a href="{{ route('admin.categorias.create')}}" class="btn btn-success float-left" title="NUEVO"><i class="fa fa-plus"></i></a>
                    </td>  
                    <td colspan="2">
                        <div class="form-inline float-right">                                
                            {{--  <div class="form-group">  
                                <label for="f_search">Buscar: </label>                                  
                                <input id="f_search" name="f_search" type="text" class="form-control " placeholder="Ingrese publicacion"></td>
                            </div>                                  --}}
                        </div>
                    </td>
                    
                </tr>
            </table>                
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered mx-auto">
                    <thead class="thead-dark">
                    <tr>
                        <th style="width:4rem;max-width:4rem"></th>
                        <th style="width:4rem;max-width:4rem"></th>
                        <th style="width:4rem;max-width:4rem"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>
                                    <a class="btn" href="{{ route('admin.categorias.edit',$categoria)}}"><i class="fas fa-edit"></i></a>
                                </td>                                
                                <td>
                                    <form id="myform{{$categoria->id}}" class="formulario_delete" action="{{ route('admin.categorias.destroy',$categoria)}}" method="post">                                                
                                        <button type="submit" class="btn"><i class="fas fa-trash"></i></button>
                                        <input type="hidden" name="_method" value="delete" />
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>
                                <td>
                                    <a class="btn" href="{{ route('admin.categorias.show',$categoria)}}"><i class="fas fa-book"></i></a>
                                </td>
                                <td>{{$categoria->nombre}}</td>
                                <td>{{$categoria->descripcion}}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            {{$categorias->links()}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        console.log('Hi!'); 
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