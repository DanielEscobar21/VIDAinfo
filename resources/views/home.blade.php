@extends('adminlte::page')

@section('title', 'Dashboard - ')

@section('content_header')

    <br>
@stop

@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
        <h1>Bienvenido a MedicaInfo</h1>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ultimos Medicamentos</h4>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row row-cols-2 row-cols-lg-2 g-2 g-lg-2">
                                @foreach ($products as $product)

                                    <div class="card col" style="width: 18rem;">
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

                                @endforeach
                            </div>
                           </div>

                        </div>
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
@stop
