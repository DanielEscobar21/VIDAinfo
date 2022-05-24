@extends('adminlte::page')

@section('title', $product->name_product . ' - ')

@section('content_header')
<a class="btn btn-light" href="{{route('products.index')}}"><i class="fas fa-chevron-left"></i> Regresar a todos los Medicamentos.</a>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>{{$product->name_product}}</h1>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="col">Información</h4>
                        <div class="col-md-auto">
                            <a class="btn btn-light" href="{{route('products.edit', $product)}}"><i class="fas fa-edit"></i>Modificar Información</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Nombre del Medicamento: </label>
                            <h5>{{$product->name_product}}</h5>
                        </div>
                        <div class="col">
                            <label class="form-label">Tipo de Medicamento: </label>
                            <h5>
                                @switch($product->presentation_product)
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
                                {{' '.$product->presentation_product}}
                            </h5>
                        </div>

                    </div><br>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Contenido del Medicamento: </label>
                            <h5>{{$product->content_product}}</h5>
                        </div>
                        <div class="col">
                            <label class="form-label">Dosis Recomendada: </label>
                            <h5>{{$product->dose_product}}</h5>
                        </div>
                        <div class="col">
                            <label class="form-label">Padeciminetos para los que sirve: </label>
                            @foreach ($product->ailments as $ailment)
                            <h5>{{$ailment->name_ailment}}</h5>
                            @endforeach
                        </div>
                    </div>
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
    <script> console.log('Hi!'); </script>
@stop
