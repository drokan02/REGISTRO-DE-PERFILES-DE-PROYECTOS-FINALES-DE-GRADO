@extends('layouts.menu')
@section('titulo','AÑADIR UN NUEVO ROL')
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

            
            <form method="POST" action="{{route('guardarRol')}}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="nombre_rol">Nombre del Rol</label>
                    <input type="text" class="form-control" name="nombre_rol" id="nombre_rol" value="{{old('nombre_rol')}}">
                </div>
                <div class="form-group mb-4">
                    <label for="privilegios">Privilegios del Rol</label>
                    <select class="form-control" id="privilegios" name="privilegios" value="{{old('privilegios')}}">
                        <option>seleccione una opcion</option>
                        <option>alto</option>
                        <option>medio</option>
                        <option>bajo</option>
                    </select>
                </div>
                <a href="{{route('roles')}}" class="btn btn-outline-primary btn-lg">Lista Roles</a>
                <button type="submit" class="btn btn-outline-success btn-lg">Crear</button>
            </form>
        </div>
    </div>

@endsection