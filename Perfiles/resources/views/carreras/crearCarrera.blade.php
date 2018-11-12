@extends('layouts.menu')
@section('titulo','CREAR UNA NUEVA CARRERA')
@section('contenido')

<div class="row justify-content-center mt-4">
		<div class= "col-sm-9" style="left: 100px;">
        <form method="POST" action="{{route('guardarCarrera')}}">
            {!! csrf_field() !!}
            <div class="form-group row">
                <label for="codigo_carrera" class="col-sm-2 col-form-label">Codigo Carrera</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="codigo_carrera" name="codigo_carrera" value="{{old('codigo_carrera')}}">
                </div>
        
            </div>
            <div class="form-group row">
                <label for="nombre_carrera" class="col-sm-2 col-form-label">Carrera</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="nombre_carrera" id="nombre_carrera" value="{{old('nombre_carrera')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-7">
                    <textarea class="form-control" rows="5" name="descripcion" id="descripcion">{{old('descripcion')}}</textarea>
                </div>
            </div>

            <div class = "form-group row"> 
                <div class="col-sm-2"></div>
                <div class="col-8">
                    <a href="{{route('carreras')}}" class="btn btn-danger">Lista Carreras</a>	
                    <button type="submit" class='btn btn-success registrar'>Registrar</button>
                </div>		
            </div>
        </form>
    </div>
</div>
  
@endsection