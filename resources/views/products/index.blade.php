@extends('adminlte::page')

@section('title', 'Medicamentos - ')

@section('content_header')
    <br>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <div class="container">
            <div class="row">
              <div class="col">
                <h1>Medicamentos</h1>
              </div>
              <div class="col-md-auto">
                <a class="btn btn-lg btn-light" href="{{route('products.create')}}"><i class="fas fa-plus"></i> Agregar Nuevo Medicamento</a>
              </div>
            </div>
          </div>
    </div>
    <div class="card-body">
        <table id="table_id2" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo de Producto</th>
                    <th>Contenido</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->name_product}}</td>
                    <td>@switch($product->presentation_product)
                        @case('Extractos')
                        <i class="fas fa-prescription-bottle"></i>
                            @break
                        @case('Plantas en frasco')
                        <i class="fas fa-seedling"></i>
                            @break
                        @case('Tabletas')
                        <i class="fas fa-tablets"></i>
                            @break
                        @case('Cápsulas')
                        <i class="fas fa-capsules"></i>
                            @break
                        @case('Jarabes')
                        <i class="fas fa-prescription-bottle"></i>
                            @break
                        @case('Tónico')
                        <i class="fas fa-tint"></i>
                            @break
                        @case('Shampoos')
                        <i class="fas fa-air-freshener"></i>
                            @break
                        @case('Jabones')
                        <i class="fas fa-soap"></i>
                            @break
                        @case('Té')
                        <i class="fas fa-mug-hot"></i>
                            @break
                        @case('Cremas Líquidas')
                        <i class="fas fa-hand-holding-water"></i>
                            @break
                        @case('Geles Corporales')
                        <i class="fas fa-child"></i>
                            @break
                        @case('Cremas')
                        <i class="fas fa-pump-soap"></i>
                            @break
                        @case('Aceites Esenciales' || 'Aceites')
                        <i class="fas fa-wine-bottle"></i>
                            @break
                        @default
                    @endswitch
                        {{$product->presentation_product}}
                    </td>
                    <td>{{$product->content_product}}</td>
                    <td><a class="btn btn-light btn-sm btn-block" href="{{route('products.show', $product->id)}}">Ver</a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> $(document).ready( function () {
        $('#table_id2').DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
        });
    } ); </script>
@stop
