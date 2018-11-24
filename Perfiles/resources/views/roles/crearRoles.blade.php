@extends('layouts.menu')
@section('titulo','AÑADIR UN NUEVO ROL')
@section('contenido')
    <div class="row justify-content-center mt-4">
        <div class= "col-sm-9" style="left: 100px;">
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
                <div class="form-group row">
                    <label for="nombre_rol"  class="col-sm-2 col-form-label">Nombre del Rol</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nombre_rol" id="nombre_rol" value="{{old('nombre_rol')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="privilegios" class="col-sm-2 col-form-label">Privilegios del Rol</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="privilegios" name="privilegios" value="{{old('privilegios')}}">
                            <option>seleccione una opcion</option>
                            <option>SuperUsuario</option>
                            <option>Usuario Normal</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row" >
                    <label for="password" class="col-sm-2 col-form-label">Permisos</label>
                    @foreach($permisos as $id=>$name)
                        <label for="permisos" class="btn btn-outline-dark">
                            <input type="checkbox" value="{{$id}}" name="permisos[]">
                            {{$name}}
                        </label>
                    @endforeach
                </div>
                <p class="font-weight-bold">el privilegio de superUsuario le permite acceder a todo el sistema</p>
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-7">
                        <a href="{{route('roles')}}" class="btn btn-danger">Lista Roles</a>
                        <button type="submit"  class='btn btn-success registrar'>Crear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection