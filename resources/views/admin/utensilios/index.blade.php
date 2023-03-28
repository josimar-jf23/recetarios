@extends('adminlte::page')

@section('title', 'Utensilios')

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
                        <h1>Utensilios</h1>
                        
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
            <a href="{{ route('admin.utensilios.create')}}" class="btn btn-success float-left" title="NUEVO"><i class="fa fa-plus"></i></a>
            <div class="table-responsive">
                <table class="table table-sm table-bordered mx-auto">
                    <thead class="bg-success">
                    <tr>
                        <th style="width:4rem;max-width:4rem"></th>
                        <th style="width:4rem;max-width:4rem"></th>                        
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th style="width:4rem;max-width:4rem"></th> 
                    </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($utensilios as $utensilio)
                            <tr>
                                <td>
                                    <a class="btn" href="{{ route('admin.utensilios.edit',$utensilio)}}" title="Editar"><i class="fas fa-edit"></i></a>
                                </td>                                
                                <td>
                                    <form id="myform{{$utensilio->id}}" class="formulario_delete" action="{{ route('admin.utensilios.destroy',$utensilio)}}" method="post">                                                
                                        <button type="submit" class="btn" title="Eliminar"><i class="fas fa-trash"></i></button>
                                        <input type="hidden" name="_method" value="delete" />
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                </td>                                
                                <td>{{$utensilio->nombre}}</td>
                                <td>{{$utensilio->descripcion}}</td>
                                <td style="text-align: center;">
                                    @isset($utensilio->image)
                                    <div class="button-container">
                                        <img class="img-thumbnail" src="{{ Storage::url($utensilio->image->url) }}" data-holder-rendered="true" style="width: 30px; height: 30px;cursor: pointer;" alt="Sin imagen" onclick="abrirModalImagen('{{ Storage::url($utensilio->image->url) }}','{{$utensilio->nombre}}')">
                                    </div>                       
                                    @endisset
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">SIN DATOS QUE MOSTRAR</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
            {{$utensilios->links()}}
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="button-container">
                            <img id="imagen_visor" class="img-thumbnail" alt="50x50" src="" data-holder-rendered="true" style="max-width: 400px; max-height: 300px;" alt="Sin imagen" >
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        function abrirModalImagen(url,titulo=""){
            document.getElementById("imagen_visor").setAttribute("src", url);
            $("#modalLabel").html(titulo);
            $('#exampleModal').modal('show');
        }
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