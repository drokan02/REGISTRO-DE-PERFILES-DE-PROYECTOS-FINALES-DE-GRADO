@extends('layouts.menu')
@section('titulo','Importar datos Carreras')
@section('contenido')
    <form method="POST" action="{{route('importacionCarrera')}}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group mb-4">
            <label for="importar_carreras">Importar carreras</label>
            <input type="file" class="form-control" id="importar_carreras" name="importar_carreras" value="{{old('importar_carreras')}}">
        </div>
        <a href="{{route('carreras')}}" class="btn btn-outline-primary btn-lg">Lista Carreras</a>
        <button type="submit" class="btn btn-outline-success btn-lg">Importar</button>
    </form>
@endsection