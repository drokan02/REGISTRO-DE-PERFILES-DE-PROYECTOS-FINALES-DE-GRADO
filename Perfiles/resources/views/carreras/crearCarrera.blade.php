@extends('layouts.menu')
@section('titulo','CREAR UNA NUEVA CARRERA')
@section('contenido')
    <div class="row justify-content-center mt-4">
        <div class="col-6">
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


            <form method="POST" action="{{route('guardarCarrera')}}">
                {!! csrf_field() !!}
                <div class="form-group mb-4">
                    <label for="codigo_carrera">Codigo Carrera</label>
                    <input type="text" class="form-control" id="codigo_carrera" name="codigo_carrera" value="{{old('codigo_carrera')}}">

                </div>
                <div class="form-group">
                    <label for="nombre_carrera">Carrera</label>
                    <input type="text" class="form-control" name="nombre_carrera" id="nombre_carrera" value="{{old('nombre_carrera')}}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" name="descripcion" id="descripcion">{{old('descripcion')}}</textarea>
                </div>
                <a href="{{route('carreras')}}" class="btn btn-outline-primary btn-lg">Lista Carreras</a>
                <button type="submit" class="btn btn-outline-success btn-lg">Crear</button>
            </form>
        </div>
    </div>
@endsection