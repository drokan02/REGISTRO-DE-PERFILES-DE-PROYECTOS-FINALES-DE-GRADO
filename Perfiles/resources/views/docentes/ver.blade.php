@extends('layouts.menu')
@section('titulo','DOCENTE')
@section('contenido')
    
    <div class="container">
        
        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Codigo:</b> {{$docente->codigo_sis}}</label>
        </div>
        
        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>CaragaHoararia:</b> {{$docente->carga_horaria}}</label>
        </div>

        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Profesional_id:</b> <p style="font-size:25px" width ="30%"> {{$docente->profesional_id}}</p></label>
        </div>
    </div >
@endsection