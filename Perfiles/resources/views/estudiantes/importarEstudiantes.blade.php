@extends('layouts.menu')
@section('titulo','Importar Datos de Estudiantes')
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
        <div class="col">
            <label for="carrera">Carrera   (*)</label>
            <select class="form-control" name="carrera" id="carrera">
                <option>seleccione una opcion</option>
                @foreach($carreras as $carrera)
                    <option>{{$carrera}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-4">
            <label for="importar_estudiantes">Agregar el Archivo Excel de Estudiantes</label>
            <input type="file" class="form-control" id="importar_estudiantes" name="importar_estudiantes" value="{{old('importar_estudiantes')}}">
        </div>
        <button type="submit" class="btn btn-outline-success btn-lg">Importar y Registrar  </button>
        <a href="{{route('estudiantes')}}" class="btn btn-outline-primary btn-lg">Lista Estudiantes</a>
        
    </form>
@endsection