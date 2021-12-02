@extends('adminlte::page')

@section('title', 'Editar Paciente - ')

@section('content_header')
<a class="btn btn-light" href="{{route('products.index')}}"><i class="fas fa-chevron-left"></i> Regresar a todos los Medicamentos.</a> 
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Editar Información del Medicamento {{$product->name_product}}</h1>
    </div>
    <div class="card-body">
        <div class="container">
            <form class="form-group" action="{{route('products.update', $product)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <label for="name_product" class="form-label">Nombre del Producto *</label>
                        <input class="form-control col" id="name_product" name="name_product" value="{{$product->name_product}}">
                        @error('name_product')
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            El campo Nombre del Producto no puede estar vacío.
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="presentation_product" class="form-label">Tipo de Producto *</label><br>                
                        <select class="form-control" aria-label="Default select example" id="presentation_product" name="presentation_product" selected="{{$product->presentation_product}}">
                            <option value="{{$product->presentation_product}}" selected>{{$product->presentation_product}}</option>
                            <option value="Extractos">Extractos</option>
                            <option value="Plantas en frasco">Plantas en frasco</option>
                            <option value="Tabletas">Tabletas</option>
                            <option value="Cápsulas">Cápsulas</option>
                            <option value="Jarabes">Jarabes</option>
                            <option value="Tónicos">Tónico</option>
                            <option value="Propóleo">Propóleo</option>
                            <option value="Balsadami">Balsadami</option>
                            <option value="Té">Té</option>
                            <option value="Shampoos">Shampoos</option>
                            <option value="Cremas">Cremas</option>
                            <option value="Jabones">Jabones</option>
                            <option value="Cremas Líquidas">Cremas Líquidas</option>
                            <option value="Geles Corporales">Geles Corporales</option>
                            <option value="Aceites Esenciales">Aceites Esenciales</option>
                            <option value="Aceites">Aceites</option>
                            <option value="Otro">Otro</option>
                        </select>
                        @error('presentation_product')
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            El campo Tipo de Producto no puede estar vacío.
                        </div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="dose_product" class="form-label">Dósis <sup><small>(Opcional)</small></sup></label>
                    <textarea class="form-control col" id="dose_product" name="dose_product" rows="3" >{{$product->dose_product}}</textarea>
                    @error('dose_product')
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        El campo Dósis no puede estar vacío.
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content_product" class="form-label">Contenido del producto *</label>
                    <textarea class="form-control" id="content_product" name="content_product" rows="3" >{{$product->content_product}}</textarea>   
                    @error('content_product')
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        El campo Contenido del producto no puede estar vacío.
                    </div>
                    @enderror                   
                </div>
                <div>
                    *NOTA: De momento no se puede modificar los padecimientos de los medicamentos.

                </div>
                <!--<div class="form-group">
                    <label for="" class="form-label">Seleccione los padeciminetos para los que este medicamento funciona:</label>             

                    <select class="ailments form-control form-control-lg" name="ailments[]"  multiple="multiple">
                        @foreach ($ailments as $ailment)
                            <option value="{{$ailment->id }}" >{{ $ailment->name_ailment }}</option>
                        @endforeach
                    </select>
                    <br>
                </div>-->
                <br>                
                <div class="d-grid gap-2">
                    <div class="row">
                        <div class="col-8">
                            <button class="btn btn-lg btn-light btn-block" type="submit"><i class="fas fa-user-plus"></i> Editar Información</button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-lg btn-danger btn-block" data-toggle="modal"
                            data-target="#modal-notification"><i class="fas fa-exclamation-triangle"></i>
                            Eliminar Medicamento</button>
                        </div>
                    </div>                   
                </div>
            </form>
        </div>
    </div>
</div>
<!-- MODAL -->
<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h4 class="heading mt-4">¿Seguro que desea eliminar al medicamento {{$product->name_product . ' ' . $product->lastname_product}}?
                    </h4>
                    <p>Al dar click en aceptar se eliminara el medicamento, incluso de las recetas y padeciminetos almacenados.</p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('products.destroy',$product)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-white">Aceptar, borrar el medicamento</button>
                </form>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Cancelar</button>
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
        $(document).ready(function() {
            $('.ailments').select2({
                theme: 'classic'
            });
        });
    </script>
@stop