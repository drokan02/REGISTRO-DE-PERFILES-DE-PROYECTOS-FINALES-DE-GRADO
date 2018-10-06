@extends('layouts.menu')
@section('titulo','AREA')
@section('contenido')
    
    <div class="container">
        
        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Codigo:</b> {{$area->codigo}}</label>
        </div>
        
        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Nombre:</b> {{$area->nombre}}</label>
        </div>

        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Descripcion:</b> <p style="font-size:25px" width ="70%"> {{$area->description}}</p></label>
        </div>
    </div >
@endsection