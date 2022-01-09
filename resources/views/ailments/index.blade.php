@extends('adminlte::page')

@section('title', 'Productos - ')

@section('content_header')
    <br>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <div class="container">
            <div class="row">
              <div class="col">
                <h1>Padecimientos</h1>
              </div>
              <div class="col-md-auto">
                <a class="btn btn-lg btn-light" href="{{route('ailments.create')}}"><i class="fas fa-plus"></i> Agregar Nuevo Padecimiento</a>
              </div>
            </div>
          </div>
    </div>
    <div class="card-body">
        <table id="table_id2" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ailments as $ailment)
                <tr>
                    <td>{{$ailment->name_ailment}}</td>                    
                    <td><a class ="btn btn-light btn-sm btn-block" href="{{route('ailments.show', $ailment->id)}}">Ver</a> </td>
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