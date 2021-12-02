@extends('adminlte::page')

@section('title', 'Editar Paciente - ')

@section('content_header')
<a class="btn btn-light" href="{{route('patients.show', $patient)}}"><i class="fas fa-chevron-left"></i> Regresar al paciente</a> 
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Editar Información del Paciente {{$patient->name_patient . ' ' . $patient->lastname_patient}}</h1>
    </div>
    <div class="card-body">
        <div class="container">
            <form class="form-group" action="{{route('patients.update', $patient)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <label for="name_patient" class="form-label">Nombre *</label>
                        <input class="form-control col" type="text" id="name_patient" name="name_patient" value="{{$patient->name_patient}}">
                        @error('name_patient')
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            El campo Nombre no puede estar vacío.
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="lastname_patient" class="form-label">Apellidos *</label>
                        <input class="form-control col" id="lastname_patient" name="lastname_patient" value="{{$patient->lastname_patient}}">
                        @error('lastname_patient')
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            El campo Apellido no puede estar vacío.
                        </div>
                        @enderror
                    </div>
                    <div class="col col-lg-2">
                        <label for="gender_patient" class="form-label">Genero *</label>
                        <select name="gender_patient" class="form-control" id="gender_patient">
                        <option value="{{$patient->gender_patient}}" selected>
                        @if ($patient->gender_patient=="M")
                            Masculino
                        @elseif($patient->gender_patient=="F")
                            Femenino
                        @else
                            Otro
                        @endif
                        </option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="O">Otro</option>
                        </select>
                        @error('gender_patient')
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            El campo Género no puede estar vacío.
                        </div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="email_patient" class="form-label">Email <sup><small>(Opcional)</small></sup></label>
                        <input type="email" class="form-control col" id="email_patient" name="email_patient" value="{{$patient->email_patient}}">                        
                    </div>
                    <div class="col-md-auto">
                        <label for="age_patient" class="form-label">Fecha de Nacimiento *</label>
                        <input type = "date" class="form-control col" id="age_patient" value="{{$patient->age_patient}}" name="age_patient">
                        @error('age_patient')
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            El campo Fecha de Nacimiento no puede estar vacío.
                        </div>
                        @enderror
                    </div>
                    <div class="col col-lg-2">
                        <label for="phone_patient" class="form-label">Teléfono *</label>
                        <input class="form-control col" id="phone_patient" value="{{$patient->phone_patient}}"name="phone_patient">
                        @error('phone_patient')
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            @if ($message=="validation.max.string")
                                El campo Teléfono no puede tener más de 10 carácteres.
                            @elseif($message=="validation.required")
                                El campo Teléfono no puede estar vacío.
                            @endif
                        </div>
                        @enderror
                    </div>
                </div>
                <br>
                <span class="text-muted">* Campos Obligatorios</span>
                <br><br>                  
                <div class="d-grid gap-2">
                    <div class="row">
                        <div class="col-8">
                            <button class="btn btn-lg btn-light btn-block" type="submit"><i class="fas fa-user-plus"></i> Editar Información</button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-lg btn-danger btn-block" data-toggle="modal"
                            data-target="#modal-notification"><i class="fas fa-exclamation-triangle"></i>
                            Eliminar Paciente</button>
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
                    <h4 class="heading mt-4">¿Seguro que desea eliminar al paciente {{$patient->name_patient . ' ' . $patient->lastname_patient}}?
                    </h4>
                    <p>Al dar click en aceptar se eliminaran todos los tratamientos, recetas e información del paciente.</p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('patients.destroy',$patient)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-white">Aceptar, borrar al paciente</button>
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
    <script> console.log('Hi!'); </script>
@stop