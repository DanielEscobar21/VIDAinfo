@extends('adminlte::page')

@section('title', 'Crear Nuevo Paciente - ')

@section('content_header')
<a class="btn btn-light" href="{{route('patients.index')}}"><i class="fas fa-chevron-left"></i> Regresar a todos los pacientes.</a> 
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Insertar Nuevo Paciente</h1>
    </div>
    <div class="card-body">
        <div class="container">
            <form class="form-group" action="{{route('patients.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="name_patient" class="form-label">Nombre *</label>
                        <input class="form-control col" type="text" id="name_patient" name="name_patient" value="{{old('name_patient')}}">
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
                        <input class="form-control col" id="lastname_patient" name="lastname_patient"  value="{{old('lastname_patient')}}">
                        @error('lastname_patient')
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            El campo Apellido no puede estar vacío.
                        </div>
                        @enderror
                    </div>
                    <div class="col col-lg-2">
                        <label for="gender_patient" class="form-label">Género *</label>
                        <select name="gender_patient" class="form-control" id="gender_patient">
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
                        <input type="email" class="form-control col" id="email_patient" name="email_patient"  value="{{old('email_patient')}}">                  
                    </div>
                    <div class="col-md-auto">
                        <label for="age_patient" class="form-label">Fecha de Nacimiento *</label>
                        <input type = "date" class="form-control col" id="age_patient" name="age_patient" value="{{old('age_patient')}}">
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
                        <input class="form-control col" id="phone_patient" name="phone_patient" value="{{old('phone_patient')}}">
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
                    <button class="btn btn-lg btn-light btn-block" type="submit"><i class="fas fa-user-plus"></i> Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@stop

@section('css')
@stop

@section('js')
@stop