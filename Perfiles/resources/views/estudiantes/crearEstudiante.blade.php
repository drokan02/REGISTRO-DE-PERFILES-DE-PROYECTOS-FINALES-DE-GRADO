@extends('layouts.menu')
@section('titulo','Crear Estudiante')
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
<form class="col-9" method="POST" action="{{route('guardarEstudiante')}}">
{!! csrf_field() !!}<!--siempre añadir el token--->
    <div class="form-group row">
        <div class="col">
            <label for="nombre">Nombre Completo   (*)</label>
            <input type="text" class="form-control" name="nombres" id="nombre" value="{{old('nombre')}}"  placeholder="ApellidoPaterno  ApellidoMaterno   Nombres">
        </div>
    </div>

    <div class="form-group row">
        <div class="col">
            <label for="email">Email  (*)</label>
            <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
        </div>
        <div class="col">
            <label for="user_name">Nombre Usuario  (*)</label>
            <input type="text" class="form-control" name="user_name" id="user_name" value="{{old('user_name')}}">
        </div>
    </div>

    <div class="form-group row">
        <div class="col">
            <label for="password">Password  (*)</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="col">
            <label for="password_confirmation">Confirmar Password  (*)</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        </div>
    </div>
    <div class="form-group row">
        <div class="col">
            <label for="telefono">Telefono  (*)</label>
            <input type="number" class="form-control" name="telefono" id="telefono" value="{{old('telefono')}}">
        </div>
        <div class="col">
            <label for="carrera">Carrera   (*)</label>
            <select class="form-control" name="carrera" id="carrera">
                <option>seleccione una opcion</option>
                @foreach($carreras as $carrera)
                    <option>{{$carrera}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg">Registrarse</button>
    </div>
</form>
<div class="row">
    <div class="col">
        <p>los campos (*) son obligatorios y/o necesarios para su perfil.</p>
        <p>los campos (*) se llenaran automaticamente a su perfil y no pueden cambiarse en el perfil
            , se le recomienda no equivocarse en sus datos.</p>
    </div>
</div>

@endsection