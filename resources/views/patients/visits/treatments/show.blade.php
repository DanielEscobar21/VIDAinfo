@extends('adminlte::page')

@section('title', 'Tratamiento del ' . $visit->visit_dateTime . ' - ')

@section('content_header')
    <a class="btn btn-light" href="{{route('patients.visits.show',['patient'=>$patient->id,'visit'=>$visit->id])}}"><i class="fas fa-chevron-left"></i> Regresar a la Visita</a>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h1>Tratamiento de visita del {{$visit->visit_dateTime}} de {{$patient->name_patient . ' ' .$patient->lastname_patient}}</h1>  
                </div>
                <div class="col-md-auto">
                    <a class="btn btn-light btn-block btn-lg" href="{{route('patients.visits.treatments.print',['patient'=>$patient->id,'visit'=>$visit->id, 'treatment'=>$treatment->id])}}"><i class="fas fa-print"></i> Imprimir</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Notas de la Receta</h4>
                </div>
                <div class="card-body">
                    <div id="editor">
                        <?php echo $treatment->notes_treatment?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Medicamentos</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th></th>
                            <th scope="col">Nombre del Medicamento</th>
                            <th scope="col">Dosis</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>@if ($treatment->medicament1_treatment=="null")                                
                                @else
                                {{$treatment->medicament1_treatment}}
                                @endif
                            </td>
                            <td>{{$treatment->dose1_treatment}}</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>@if ($treatment->medicament2_treatment=="null")                                
                                @else
                                {{$treatment->medicament2_treatment}}
                                @endif
                            </td>
                            <td>{{$treatment->dose2_treatment}}</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>
                                @if ($treatment->medicament3_treatment=="null")                                
                                @else
                                {{$treatment->medicament3_treatment}}
                                @endif
                            </td>
                            <td>{{$treatment->dose3_treatment}}</td>
                          </tr>
                          <tr>
                            <th scope="row">4</th>
                            <td>
                                @if ($treatment->medicament4_treatment=="null")                                
                                @else
                                {{$treatment->medicament4_treatment}}
                                @endif
                            </td>
                            <td>{{$treatment->dose4_treatment}}</td>
                          </tr>
                          <tr>
                            <th scope="row">5</th>
                            <td>
                                @if ($treatment->medicament5_treatment=="null")                                
                                @else
                                {{$treatment->medicament5_treatment}}
                                @endif
                            </td>
                            <td>{{$treatment->dose5_treatment}}</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
            </div>            
        </div>        
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
 <script>
    InlineEditor.create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stop