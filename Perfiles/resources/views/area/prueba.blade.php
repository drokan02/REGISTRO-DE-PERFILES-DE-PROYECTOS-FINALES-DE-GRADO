@extends('layouts.menu')
@section('titulo','LISTAR AREAS')
@section('contenido')
<form method="GET" action="{{route('buscarArea')}}">
    <input type="text" name="prubra" value="{{old('prueba')}}">
    <button type="submit">crear</button>
</form>
@endsection