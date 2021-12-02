@extends('adminlte::page')

@section('title', 'Crear Nuevo Padecimiento - ')

@section('content_header')
<a class="btn btn-light" href="{{route('ailments.index')}}"><i class="fas fa-chevron-left"></i> Regresar a todos los Padecimientos.</a> 
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Insertar Nuevo Padecimiento</h1>
    </div>
    <div class="card-body">
        <div class="container">
            <form class="form-group" action="{{route('ailments.store')}}" method="POST"> 
                @csrf               
                <div class="row">
                    <div class="col">
                        <label for="name_ailment" class="form-label">Nombre del Padecimiento *</label>
                        <input class="form-control col" type="text" id="name_ailment" name="name_ailment" value="{{old('name_ailment')}}">
                        @error('name_ailment')
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            @if ($message=="validation.unique")
                                Este Padecimiento ya se encuentra registrado.
                            @else
                                El campo Nombre del Padecimiento no puede estar vacío.
                            @endif
                        </div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="d-grid gap-2">
                    <button class="btn btn-lg btn-light btn-block" type="submit"><i class="fas fa-plus"></i> Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@stop