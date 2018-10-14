@extends('layouts.menu')
@section('titulo','REGISTRAR USUARIO')
@section('contenido')
    <div class="row justify-content-center mt-4">
        <div class= "col-sm-9" style="left: 100px;">
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
            <form method="POST" action="{{route('guardarUsuario')}}">
                {!! csrf_field() !!}
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nombre Completo</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_name" class="col-sm-2 col-form-label">Nombre de Usuario</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="user_name" id="user_name" value="{{old('user_name')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                    </div>
                </div>
                <div class="form-group row" >
                    <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
                    </div>
                </div>
                <div class="form-group row" >
                    <label for="password" class="col-sm-2 col-form-label">Roles</label>
                    @foreach($roles as $id=>$nombre_rol)
                        <label for="roles" class="btn btn-outline-dark">
                            <input type="checkbox" value="{{$id}}" name="roles[]">
                            {{$nombre_rol}}
                        </label>
                    @endforeach
                </div>
               <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class ="col-sm-7">
                        <a href="{{route('usuarios')}}" class='btn btn-danger'>Lista Usuarios</a>
                        <button type="submit" class='btn btn-success registrar'>Crear</button>
                    </div>
               </div>
            </form>
        </div>
    </div>
@endsection