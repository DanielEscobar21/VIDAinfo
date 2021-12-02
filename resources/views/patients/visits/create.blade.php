@extends('adminlte::page')

@section('title', 'Nueva Visita para '.$patient->name_patient . ' ' .$patient->lastname_patient.' - ')

@section('content_header')
<a class="btn btn-light" href="{{route('patients.show', $patient)}}"><i class="fas fa-chevron-left"></i> Regresar al Paciente</a> 
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Nueva Visita de {{$patient->name_patient . ' ' .$patient->lastname_patient}}</h1>
    </div>
    <div class="card-body">
        <div class="container">
            <form action="{{route('patients.visits.store', $patient->id)}}" method="POST" >
                @csrf            
                <div class="form-group">
                    <label for="visit_dateTime" class="form-label">Fecha y hora de Visita *</label>
                    <input class="form-control" id="datetimepicker" value="{{NOW()}}"name="visit_dateTime" type="text" >
                    @error('visit_dateTime')
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            El campo Fecha no puede estar vacío.
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="visit_observations" class="form-label">Observaciones de Visita *</label>
                    <textarea id="editor" name="visit_observations"></textarea>
                    @error('visit_observations')
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        El campo Observaciones de la Visita no puede estar vacío.
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="visit_state" class="form-label">Estado del Paciente *</label>
                    <input type="range" name="visit_state" list="tickmarks" value="0" class="form-control" min="0" max="10" step="1" id="customRange3">
                    <datalist id="tickmarks">
                        <option value="0">
                        <option value="1">
                        <option value="2">
                        <option value="3">
                        <option value="4">
                        <option value="5">
                        <option value="6">
                        <option value="7">
                        <option value="8">
                        <option value="9">
                        <option value="10">
                    </datalist>
                    @error('visit_state')
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        El campo El campo Estado de la Visita no puede estar vacío.
                    </div>
                    @enderror                                
                </div><br>                
                <span class="text-muted">* Campos Obligatorios</span>
                <br><br> 
                <div class="d-grid gap-2">
                    <button class="btn btn-lg btn-light btn-block" type="submit">Crear Visita</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('datetimepicker/build/jquery.datetimepicker.min.css')}}" />
@stop

@section('js')
    <script src="{{ asset('datetimepicker/build/jquery.datetimepicker.full.min.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script>
    $(document).ready(function(){
        jQuery('#datetimepicker').datetimepicker({
            i18n:{
                de:{
                months:[
                    'Enero','Febrero','Marzo','Abril',
                    'Mayo','Junio','Julio','Agosto',
                    'Septiembre','Octubre','Noviembre','Diciembre',
                ],
                dayOfWeek:[
                    "Dom", "Lun", "Mar", "Mie", 
                    "Jue", "Vie", "Sab",
                ]
                }
                },
                format:'Y-m-d h:m:s'
        });
    });
    </script>
    <script>
        ClassicEditor.create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            config.defaultLanguage = 'it';
            } );
    </script>
@stop