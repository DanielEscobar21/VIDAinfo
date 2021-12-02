@extends('adminlte::page')

@section('title', 'Dashboard - ')

@section('content_header')

    <br>
@stop

@section('content')
<div class="container">
<div class="card">
    
    <div class="card-header">
        <h1>Nueva Carta Membretada</h1>
    </div>
    <div class="card-body">
        <div class="container">
            <form action="{{route('documents.letterhead.print')}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="container">
                        <div class="row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-4">
                            <label for="" class="form-label">Fecha de Remisión *</label>
                            <input type="date" class="form-control" name="dateSended" value="{{date("d/M/Y")}}">
                        </div>
                        </div>
                    </div>                
                </div>
                <div class="form-group">
                    <label for="visit_observations" class="form-label">Destinatario *</label>
                    <input type="text" class="form-control" name="destiny">
                </div>
                <div class="form-group">
                    <label for="visit_observations" class="form-label">Cuerpo de la Carta *</label>
                    <textarea id="editor" name="visit_observations" name="bodyCart"></textarea>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Despedida <sup><small>(Opcional)</small></sup></label>
                    <input type="text" class="form-control" name="byCart">
                </div><br>
                <span class="text-muted">* Campos Obligatorios</span>
                <br><br> 
                <button type="submite" class="btn btn-light btn-lg btn-block"><i class="fas fa-print"></i> Imprimir </button>
            </form>
        </div>    
    </div>
</div>
</div>
@stop
@section('css')
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            config.defaultLanguage = 'it';
            } );
    </script>
@stop