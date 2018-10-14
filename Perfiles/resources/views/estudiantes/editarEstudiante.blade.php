@extends('layouts.menu')
@section('titulo','EDITAR DATOS DEL ESTUDIANTE: '.$estudiante->user_name)
@section('contenido')

    @if($errors ->any())
        <div class="alert-danger">
            <h3>Se tiene los siguientes errores en el formulario</h3>
            <ul>
                @foreach($errors->all() as $errors)
                    <li>{{$errors}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{route('actualizarEstudiante',$estudiante)}}">
        {{method_field('PUT')}}
        {!! csrf_field() !!}<!--siempre añadir el token--->
            <div class="form-group row">
                <div class="col">
                    <label for="nombre">Nombre Completo</label>
                    <input type="text" class="form-control" name="nombres" id="nombre" value="{{old('nombre',$estudiante->nombres)}}">
                </div>
            </div>

            <div class="form-group row">
                <div class="col">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{old('email',$estudiante->email)}}">
                </div>
                <div class="col">
                    <label for="user_name">Nombre Usuario</label>
                    <input type="text" class="form-control" name="user_name" id="user_name" value="{{old('user_name',$estudiante->user_name)}}">
                </div>
            </div>

            <div class="form-group row">
                <div class="col">
                    <label for="telefono">Telefono</label>
                    <input type="number" class="form-control" name="telefono" id="telefono" placeholder="no obligatorio" value="{{old('telefono',$estudiante->telefono)}}">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
            </div>
    </form>


@endsection
