@extends('layouts.menu')
@section('titulo','DOCENTE')
@section('contenido')
    
    <div class="container">
        
        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Nombre:</b> {{$docente->profesional->nombre_prof}}</label>
        </div>

        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Apellidos:</b> {{$docente->profesional->ap_pa_prof}}  {{$docente->profesional->ap_ma_prof}}</label>
        </div>

        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Correo:</b> {{$docente->profesional->correo_prof}}</label>
        </div>

        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>CI:</b> {{$docente->profesional->ci_prof}}</label>
        </div>
        
        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Telefono:</b> {{$docente->profesional->telef_prof}}</label>
        </div>

        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Direccion:</b> {{$docente->profesional->direc_prof}}</label>
        </div>
        
        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Codigo:</b> {{$docente->codigo_sis}}</label>
        </div>
        
        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>CaragaHoararia:</b> {{$docente->cargahoraria->carga_horaria}}</label>
        </div>

        <div class="form-group row">
                <label class="col-sm-12 col-form-label" style="font-size:25px"> <b>Area:</b> {{$docente->profesional->areas}}</label>
        </div>
    

    </div >
@endsection