@extends('adminlte::page')

@section('title', $patient->name_patient . ' ' .$patient->lastname_patient . ' - ')

@section('content_header')
    <a class="btn btn-light" href="{{route('patients.index')}}"><i class="fas fa-chevron-left"></i> Regresar al todos los pacientes</a>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>{{$patient->name_patient . ' ' .$patient->lastname_patient}}</h1>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="col">Información Personal</h4>
                        <div class="col-md-auto">
                            <a class="btn btn-light" href="{{route('patients.edit', $patient)}}"><i class="fas fa-user-edit"></i> Modificar Información</a>
                        </div>
                    </div>                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Nombre Completo: </label>
                            <h5>{{$patient->name_patient . ' ' .$patient->lastname_patient}}</h5>
                        </div>
                        <div class="col">
                            <label class="form-label">Edad: </label>
                            <h5><?php
                            $born = new DateTime($patient->age_patient);
                            $now = new DateTime(date("Y-m-d"));
                            $age = $now->diff($born);;
                            echo $age->format('%y años');                         
                            
                            ?></h5>
                        </div>
                        <div class="col">
                            <label class="form-label">Género: </label>
                            <h5>
                                @if ($patient->gender_patient=="M")
                                Masculino
                                @elseif($patient->gender_patient=="F")
                                Femenino
                                @else
                                Otro
                                @endif
                            </h5>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Teléfono: </label>
                            <h5>{{$patient->phone_patient}}</h5>
                        </div>
                        <div class="col">
                            <label class="form-label">Correo Electrónico: </label>
                            <h5>{{$patient->email_patient}}</h5>
                        </div>
                        <div class="col">
                            <label class="form-label">Fecha de Ingreso: </label>
                            <h5>{{$patient->created_at}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="col">Visitas</h4>
                        <div class="col-md-auto">
                            <a class="btn btn-light" href="{{route('patients.visits.create', $patient)}}"><i class="fas fa-plus"></i> Nueva Visita</a>
                        </div>
                    </div>                    
                </div>
                <div class="card-body">
                    <table id="table_id" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Fecha de Visita</th>
                                <th>Estado del Paciente</th>
                                <th>Receta(Si/No)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visits as $visit)
                            <tr>
                                <td>{{$visit->visit_dateTime}}</td>
                                <td> @if ($visit->visit_state<=4)                                    
                                    <b class="text-danger"><i class="far fa-frown"></i> {{$visit->visit_state}}</b>/10
                                    @elseif($visit->visit_state<=7)
                                    <b class="text-warning"><i class="far fa-meh"></i> {{$visit->visit_state}}</b>/10
                                    @elseif($visit->visit_state<=10)
                                    <b class="text-success"><i class="far fa-laugh-beam"></i> {{$visit->visit_state}}</b>/10   
                                    @endif
                                </td>
                                <td>
                                    No
                                </td>
                                <td>
                                    <a class="btn btn-light" href="{{route('patients.visits.show',['patient'=>$patient->id,'visit'=>$visit->id])}}">Ver Visita</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                    
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
<script> $(document).ready( function () {
    $('#table_id').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Visitas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Visitas",
            "infoFiltered": "(Filtrado de _MAX_ total Visitas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Visitas",
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