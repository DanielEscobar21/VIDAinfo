@extends('adminlte::page')

@section('title', 'Agregar Nuevo Medicamento - ')

@section('content_header')
<a class="btn btn-light" href="{{route('products.index')}}"><i class="fas fa-chevron-left"></i> Regresar a todos los Medicamentos.</a>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Insertar Nuevo Medicamento</h1>
    </div>
    <div class="card-body">
        <div class="container">
            <form class="form-group" action="{{route('products.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="name_product" class="form-label">Nombre del Medicamento *</label>
                        <input class="form-control col" id="name_product" name="name_product" value="{{old('name_product')}}">
                        @error('name_product')
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            El campo Nombre del Producto no puede estar vacío.
                        </div>
                        @enderror
                    </div>
                </div><br>
                <div class="row">
                    <div class="col">
                        <label for="presentation_product" class="form-label">Tipo de Medicamento *</label><br>
                        <select class="form-control" aria-label="Default select example" id="presentation_product" name="presentation_product">
                            <option selected disabled>Seleccione el Tipo de Medicamento correspondiente</option>
                            <option value="Tabletas">Tabletas</option>
                            <option value="Cápsulas">Cápsulas</option>
                            <option value="Jarabes">Jarabes</option>
                            <option value="Cremas">Cremas</option>
                            <option value="Otro">Otro</option>
                        </select>
                        @error('presentation_product')
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            El campo Tipo de Medicamento no puede estar vacío.
                        </div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="dose_product" class="form-label">Dósis <sup><small>(Opcional)</small></sup></label>
                    <textarea class="form-control col" id="dose_product" name="dose_product" rows="3" value="{{old('dose_product')}}"></textarea>
                </div>
                <div class="form-group">
                    <label for="content_product" class="form-label">Contenido del Medicamento *</label>
                    <textarea class="form-control" id="content_product" name="content_product" rows="3" value="{{old('content_product')}}"></textarea>
                    @error('content_product')
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        El campo Contenido del producto no puede estar vacío.
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Seleccione los padeciminetos para los que este medicamento funciona: *</label>
                    <select class="ailments form-control form-control-lg" name="ailments[]"  multiple="multiple">
                        @foreach ($ailments as $ailment)
                            <option value="{{$ailment->id}}" @if (old("ailments")){{ (in_array($ailment->id, old("ailments")) ? "selected":"") }}@endif>{{$ailment->name_ailment}}</option>
                        @endforeach

                    </select>
                    <br>
                    @error('content_product')
                    <br>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        Debe escoger uno o más Padecimientos.
                    </div>
                    @enderror
                </div>
                <br>
                <span class="text-muted">* Campos Obligatorios</span>
                <br><br>
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.ailments').select2({
                theme: 'classic'
            });
        });
    </script>
@stop
