@extends('layouts.menu')
@section('titulo','Cargar Datos de Areas')
@section('contenido')
<div class="container">

       
    <form  name="importarAreas" id="importarAreas" method="POST" action="{{route('importarAreas')}}">                
        
         {!! csrf_field() !!}
         <input type="hidden" name="_token" id="token"  value="{{csrf_token()}}"> 
        <div class="box-body">
            <div class="form-group col-xs-12"  >
                <label>Agregar Archivo de Excel </label>
                    <input value="{{old('archivo')}}" name="archivo" id="archivo" type="file"   class="form-control"  />
                    <input type="text" id="nombre" class="form-control" value="{{old('nombre')}}" name="nombre">
            </div>
    
        
            <div class="box-footer" >
                                <button class="importarDatos" type="submit" class="btn btn-primary">Cargar Datos</button>
            </div>
        </div>
  
    </form>
  

  
</div>
@endsection