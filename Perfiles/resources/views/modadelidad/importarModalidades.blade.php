@extends('layouts.menu')
@section('titulo','Importar datos Modalidades')
@section('contenido')
    <form method="POST" action="{{route('importacionModalidad')}}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group mb-4">
            <label for="importar_modalidad">Importar Modalidades</label>
            <input type="file" class="form-control" id="importar_modalidad" name="importar_modalidad" value="{{old('importar_modalidad')}}">
        </div>
        <a href="{{route('modalidad')}}" class="btn btn-outline-primary btn-lg">Lista Modalidades</a>
        <button type="submit" class="btn btn-outline-success btn-lg">Importar</button>
    </form>
@endsection