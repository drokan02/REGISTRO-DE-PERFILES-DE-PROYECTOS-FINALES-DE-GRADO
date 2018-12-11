@extends('layouts.menu')
@section('titulo','Importar datos Estudiantes')
@section('contenido')
    @if($errors ->any())
        <div class="alert-danger">
            <h3>Se tiene los siguientes errores en el formulario</h3>
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $errors)
                        <li>{{$errors}}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    @endif
    <form method="POST" action="{{route('importacionEstudiantes')}}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group mb-4">
            <label for="importar_estudiantes">Importar Estudiantes</label>
            <input type="file" class="form-control" id="importar_estudiantes" name="importar_estudiantes" value="{{old('importar_estudiantes')}}">
        </div>
        <a href="{{route('estudiantes')}}" class="btn btn-outline-primary btn-lg">Lista Estudiantes</a>
        <button type="submit" class="btn btn-outline-success btn-lg">Importar</button>
    </form>
@endsection