@extends('adminlte::page')

@section('title', 'Pacientes - ')

@section('content_header')
    <br>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <div class="container">
            <div class="row">
              <div class="col">
                <h1>Pacientes Registrados</h1>
              </div>
              <div class="col-md-auto">
                <a class="btn btn-lg btn-light" href="{{route('patients.create')}}"><i class="fas fa-user-plus"></i> Agregar Nuevo Paciente</a>
              </div>
            </div>
          </div>
    </div>
    <div class="card-body">
        <table id="table_id" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Edad</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                <tr>
                    <td>{{$patient->name_patient}}</td>
                    <td>{{$patient->lastname_patient}}</td>
                    <td>{{$patient->phone_patient}}</td>
                    <td><?php
                        $born = new DateTime($patient->age_patient);
                        $now = new DateTime(date("Y-m-d"));
                        $age = $now->diff($born);;
                        echo $age->format('%y años');                         
                        
                        ?></td>
                    <td><a class="btn btn-light btn-sm btn-block" href="{{route('patients.show', $patient->id)}}">Ver</a> </td>
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
        $('#table_id').DataTable({
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