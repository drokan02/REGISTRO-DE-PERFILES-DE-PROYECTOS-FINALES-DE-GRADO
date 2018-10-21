@extends('layouts.menu')
@section('titulo','Cargar Datos de Areas')
@section('contenido')
<div class="container">
    <form method="POST" action="{{route('importarAreas')}}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group mb-4">
            <label for="importar_area">Importar Areas</label>
            <input type="file" class="form-control" id="importar_area" name="importar_area" value="{{old('importar_area')}}">
        </div>
        <a href="{{route('Areas')}}" class="btn btn-outline-primary btn-lg">Lista areas</a>
        <button type="submit" class="btn btn-outline-success btn-lg">Importar</button>
    </form>
</div>
@endsection