@extends('adminlte::page')

@section('title', 'Nueva Tratamiento para '.$patient->name_patient . ' ' .$patient->lastname_patient.' - ')

@section('content_header')
<a class="btn btn-light" href="{{route('patients.visits.show', ['patient'=>$patient->id,'visit'=>$visit->id])}}"><i class="fas fa-chevron-left"></i> Regresar al la Visita</a> 
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Tratamiento para {{$patient->name_patient . ' ' .$patient->lastname_patient}}</h1>
    </div>
    <div class="card-body">
        <div class="container">
            <form action="{{route('patients.visits.treatments.store',['patient'=>$patient->id,'visit'=>$visit->id] )}}" method="POST" >
                @csrf            
                <div class="container">
                    <div class="form-group">
                        <label for="visit_observations" class="form-label">Notas Extras del Tratamiento <sup><small>(Opcional)</small></sup></label>
                        <textarea id="editor" name="notes_treatment"></textarea>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3>Medicamentos</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                      <label for="medicament1_treatment" class="form-label">Medicamento 1 *</label>
                                      <select class="form-control select-sinlge" id="medicament1_treatment" name="medicament1_treatment"> 
                                            <option value="null" disabled="disabled" selected>Busque y Seleccione un Medicamento</option>
                                            @foreach ($products as $product)
                                              <option value="{{$product->name_product}}">{{$product->name_product}}</option>
                                            @endforeach
                                      </select>
                                      @error('medicament1_treatment')
                                        <br><br>
                                        <div class="alert alert-danger" role="alert">
                                            <i class="fas fa-exclamation-triangle"></i>
                                            El tratamiento tiene que llevar al menos un medicamento no puede estar vacío.
                                        </div>
                                        @enderror
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                      <label for="dose1_treatment" class="form-label">Dósis *</label>
                                      <input type="text" class="form-control" id="dose1_treatment" name="dose1_treatment">
                                      @error('dose1_treatment')
                                        <br>
                                        <div class="alert alert-danger" role="alert">
                                            <i class="fas fa-exclamation-triangle"></i>
                                            El campo dosis no puede estar vacío.
                                        </div>
                                        @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                      <label for="medicament2_treatment" class="form-label">Medicamento 2 <sup><small>(Opcional)</small></sup></label><br>
                                      <select class="form-control select-sinlge" id="medicament2_treatment" name="medicament2_treatment"  data-default-value="null" style="width: 100%">
                                        <option value="null" selected>Busque y Seleccione un Medicamento</option>
                                            @foreach ($products as $product)
                                              <option value="{{$product->name_product}}">{{$product->name_product}}</option>
                                            @endforeach
                                      </select>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                      <label for="dose2_treatment" class="form-label">Dósis <sup><small>(Opcional)</small></sup></label>
                                      <input type="text" class="form-control" id="dose2_treatment" name="dose2_treatment">
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                      <label for="medicament3_treatment" class="form-label">Medicamento 3 <sup><small>(Opcional)</small></sup></label><br>
                                      <select class="form-control select-sinlge" id="medicament3_treatment" name="medicament3_treatment" style="width: 100%">
                                        <option value="null" selected>Busque y Seleccione un Medicamento</option>
                                            @foreach ($products as $product)
                                              <option value="{{$product->name_product}}">{{$product->name_product}}</option>
                                            @endforeach
                                      </select>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                      <label for="dose3_treatment" class="form-label">Dósis <sup><small>(Opcional)</small></sup></label>
                                      <input type="text" class="form-control" id="dose3_treatment" name="dose3_treatment">
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                      <label for="medicament4_treatment" class="form-label">Medicamento 4 <sup><small>(Opcional)</small></sup></label><br>
                                      <select class="form-control select-sinlge" id="medicament4_treatment" name="medicament4_treatment" style="width: 100%">
                                        <option value="null" selected>Busque y Seleccione un Medicamento</option>
                                            @foreach ($products as $product)
                                              <option value="{{$product->name_product}}">{{$product->name_product}}</option>
                                            @endforeach
                                      </select>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                      <label for="dose4_treatment" class="form-label">Dósis <sup><small>(Opcional)</small></sup></label>
                                      <input type="text" class="form-control" id="dose4_treatment" name="dose4_treatment">
                                  </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                      <label for="medicament5_treatment" class="form-label">Medicamento 5 <sup><small>(Opcional)</small></sup></label><br>
                                      <select class="form-control select-sinlge" id="medicament5_treatment" name="medicament5_treatment" style="width: 100%">
                                        <option value="null" selected>Busque y Seleccione un Medicamento</option>
                                            @foreach ($products as $product)
                                              <option value="{{$product->name_product}}">{{$product->name_product}}</option>
                                            @endforeach
                                      </select>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                      <label for="dose5_treatment" class="form-label">Dósis <sup><small>(Opcional)</small></sup></label>
                                      <input type="text" class="form-control" id="dose5_treatment" name="dose5_treatment">
                                  </div>
                                </div>
                            </div>                          
                        </div>
                    </div>              
                </div><br>
                <span class="text-muted">* Campos Obligatorios</span>
                <br><br> 
                <div class="row">
                    <div class="col">
                        <button class="btn btn-light btn-block btn-lg" type="submit"><i class="fas fa-save"></i> Guardar</button> 
                    </div>
                </div>               
                                
            </form>
        </div>
    </div>
</div>
    
@stop

@section('css')
    
    <link rel="stylesheet" href="{{ asset('datetimepicker/build/jquery.datetimepicker.min.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/> 
@stop

@section('js')    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-sinlge').select2({
                theme: "classic",
            });
        });
    </script>
    <script>
        ClassicEditor.create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            config.defaultLanguage = 'es';
            } );
    </script>

@stop