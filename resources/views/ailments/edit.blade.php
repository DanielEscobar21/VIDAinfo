@extends('adminlte::page')

@section('title', 'Editar Paciente - ')

@section('content_header')
<a class="btn btn-light" href="{{route('ailments.index')}}"><i class="fas fa-chevron-left"></i> Regresar a todos los Padecimientos.</a> 
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Editar Información del Padecimiento {{$ailment->name_ailment}}</h1>
    </div>
    <div class="card-body">
        <div class="container">
            <form class="form-group" action="{{route('ailments.update', $ailment)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <label for="name_ailment" class="form-label">Nombre *</label>
                        <input class="form-control col" type="text" id="name_ailment" name="name_ailment" value="{{$ailment->name_ailment}}">
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
                    <div class="row">
                        <div class="col-8">
                            <button class="btn btn-lg btn-light btn-block" type="submit"><i class="fas fa-user-plus"></i> Editar Información</button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-lg btn-danger btn-block" data-toggle="modal"
                            data-target="#modal-notification"><i class="fas fa-exclamation-triangle"></i>
                            Eliminar Padecimiento</button>
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
                    <h4 class="heading mt-4">¿Seguro que desea eliminar el Padecimiento {{$ailment->name_ailment}}?
                    </h4>
                    <p>Al dar click en aceptar se eliminara el Padecimiento incluso de los Medicamentos registrados.</p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{route('ailments.destroy',$ailment)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-white">Aceptar, borrar el Padecimiento</button>
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