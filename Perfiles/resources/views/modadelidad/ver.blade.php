@extends('layouts.menu')
@section('titulo','MODALIDAD')
@section('contenido')
    
    <div class="container">
        
        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Codigo:</b> {{$modadelidad->codigo_mod}}</label>
        </div>
        
        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Nombre:</b> {{$modadelidad->nombre_mod}}</label>
        </div>

        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Descripcion:</b> <p style="font-size:25px" width ="70%"> {{$modadelidad->descripsion_mod}}</p></label>
        </div>
    </div >
@endsection