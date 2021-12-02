@extends('adminlte::page')

@section('title', 'Dashboard - ')

@section('content_header')

    <br>
@stop

@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
        <h1>Bienvenido a VIDAinfo v1.0</h1>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ultimos Productos</h4>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                @foreach ($products as $product)                                    
                                <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
                                    <div class="card col" style="width: 18rem;">
                                        <div class="card-body">
                                          <h4 class="">{{$product->name_product}}</h4>
                                          <h6 class="card-subtitle mb-2 text-muted">
                                            @switch($product->presentation_product)
                                            @case('Extractos')
                                            <i class="fas fa-prescription-bottle"></i>
                                                @break
                                            @case('Planta en Frasco')
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
                                            @case('Tónicos')
                                            <i class="fas fa-tint"></i>
                                                @break
                                            @case('Té')
                                            <i class="fas fa-mug-hot"></i>
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
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ultimos Pacientes</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Fecha</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $pat)
                                      <tr>
                                        <td>{{$pat->name_patient .' '.$pat->lastname_patient}}</td>
                                        <td><?php
                                        echo date_format($pat->created_at, 'd-M-Y');                                        
                                        ?></td>
                                      </tr>
                                    @endforeach                                  
                                </tbody>
                              </table>
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
