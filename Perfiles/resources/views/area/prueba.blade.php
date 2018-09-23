@extends('layouts.menu')
@section('titulo','REGISTRAR ROL')
@section('contenido')
<div class="console">
    
   
    
<form method="GET" action="{{route('pruebaVer')}}">
        @if ($error == 'error')
        <div class="alert alert-danger">
            <div> ERROORRR</div>
        </div>
        @endif
    <div class="form-group row">
        <input type="text" name="nombre" id="nombre" placeholder="buscar" value="{{$nombre}}">
        <button type="submit">Enviar</button>
    </div>
</form>
</div>
@endsection