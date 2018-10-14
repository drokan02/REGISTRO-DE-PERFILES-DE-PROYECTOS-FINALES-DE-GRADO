@extends('layouts.menu')
@section('titulo','CAMBIAR CONTRASEÑA DEL Estudiante: '.$estudiante->user_name)
@section('contenido')
    <div class="row justify-content-center mt-4">
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
        <div class= "col-sm-9" style="left: 20px;">
            <form method="POST" action="{{route('guardarContraseñaEstudiante',$estudiante)}}">
                {!! csrf_field() !!}
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Introduce Nueva Contraseña</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_confirmation" class="col-sm-3 col-form-label">Repite la Contraseña</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-7">
                        <button type="submit" class="btn btn-success">Aceptar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection