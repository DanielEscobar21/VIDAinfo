@extends('adminlte::page')

@section('title', 'Visita del ' . $visit->visit_dateTime . ' - ')

@section('content_header')
    <a class="btn btn-light" href="{{route('patients.show',$patient)}}"><i class="fas fa-chevron-left"></i> Regresar al Paciente</a>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Visita del {{$visit->visit_dateTime}} de {{$patient->name_patient . ' ' .$patient->lastname_patient}}</h1>
      
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Observaciones de la Visita</h4>
                            </div>
                            <div class="card-body">
                                <div id="editor">
                                    <?php echo $visit->visit_observations?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Estado del paciente en la Visita</h4>
                            </div>
                            <div class="card-body">                                
                                    @if ($visit->visit_state<=4)                                    
                                    <h2 class="text-center"><b class="text-danger"><i class="far fa-frown"></i> {{$visit->visit_state}}</b>/10</h2>
                                    @elseif($visit->visit_state<=7)
                                    <h2 class="text-center"><b class="text-warning"><i class="far fa-meh"></i> {{$visit->visit_state}}</b>/10</h2>
                                    @elseif($visit->visit_state<=10)
                                    <h2 class="text-center"><b class="text-success"><i class="far fa-laugh-beam"></i> {{$visit->visit_state}}</b>/10</h2>    
                                    @endif                                                              
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="col">Tratamientos</h4>
                        <div class="col-md-auto">
                            <a class="btn btn-light" href="{{route('patients.visits.treatments.create', ['patient'=>$patient->id,'visit'=>$visit->id])}}"><i class="fas fa-plus"></i> Nuevo Tratamiento</a>
                        </div>
                    </div>  
                </div>
                <div class="card-body">
                    <div class="container">
                        @foreach ($treatments as $treatment)
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title"><b>{{$treatment->created_at}}</b></h5><br>
                              <div>
                                <?php echo $treatment->notes_treatment?>
                              </div>                              
                            </div>
                            <ul class="list-group list-group-flush">   
                                <li class="list-group-item"><b>Medicamentos</b></li>                           
                                @if ($treatment->medicament1_treatment=="null")                                
                                @else
                                <li class="list-group-item">{{$treatment->medicament1_treatment}}</li>
                                @endif                              
                                @if ($treatment->medicament2_treatment=="null")                                
                                @else
                                <li class="list-group-item">{{$treatment->medicament2_treatment}}</li>
                                @endif                            
                              
                                @if ($treatment->medicament3_treatment=="null")                                
                                @else
                                <li class="list-group-item">{{$treatment->medicament3_treatment}}</li>
                                @endif
                              
                              
                                @if ($treatment->medicament4_treatment=="null")                                
                                @else
                                <li class="list-group-item">{{$treatment->medicament4_treatment}}</li>
                                @endif
                              
                                @if ($treatment->medicament5_treatment=="null")                                
                                @else
                                <li class="list-group-item">{{$treatment->medicament5_treatment}}</li>
                                @endif                              
                            </ul>
                            <div class="card-body">
                              <a href="{{route('patients.visits.treatments.show',['patient'=>$patient->id,'visit'=>$visit->id,'treatment'=>$treatment->id])}}" class="card-link btn btn-light">Ver</a>
                              <a href="{{route('patients.visits.treatments.print',['patient'=>$patient->id,'visit'=>$visit->id, 'treatment'=>$treatment->id])}}" class="card-link">Imprimir</a>
                            </div>
                        </div>
                        @endforeach
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