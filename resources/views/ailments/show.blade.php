@extends('adminlte::page')

@section('title', $ailment->name_ailment.' - ')

@section('content_header')
    <a class="btn btn-light" href="{{route('ailments.index')}}"><i class="fas fa-chevron-left"></i> Regresar a todos los Padecimientos.</a>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>{{$ailment->name_ailment}}</h1>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="col">Información del Padecimiento</h4>
                        <div class="col-md-auto">
                            <a class="btn btn-light" href="{{route('ailments.edit', $ailment)}}"><i class="fas fa-edit"></i> Modificar Información</a>
                        </div>
                    </div>                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Nombre del Padecimiento: </label>
                            <h5>{{$ailment->name_ailment . ' ' .$ailment->lastname_ailment}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="col">Medicamentos</h4>
                    </div>                    
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row g-3">
                        @foreach ($ailment->products as $product)
                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">{{$product->department}}</h6>
                                  <h4 class="">{{$product->name_product}}</h4>
                                  <h6 class="card-subtitle mb-2 text-muted">
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
                                      {{$product->presentation_product}}
                                    </h6>
                                  <p class="card-text">{{$product->content_product}}</p>
                                  <a href="{{route('products.show', $product->id)}}" class="card-link">Ver Medicamento</a>
                                </div>
                            </div> 
                        </div>
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