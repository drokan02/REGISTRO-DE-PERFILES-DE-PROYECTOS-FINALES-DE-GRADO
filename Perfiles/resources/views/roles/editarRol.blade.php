@extends('layouts.menu')
@section('titulo','EDITAR ROL SELECCIONADO')
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
            <form method="POST" action="{{route('actualizarRol',['role'=>$role])}}">
                {!! csrf_field() !!}
                <div class="form-group row">
                    <label for="nombre_rol" class="col-sm-2 col-form-label">Nombre del Rol</label>
                   <div class="col-sm-7">
                        <input type="text" class="form-control" name="nombre_rol" id="nombre_rol" value="{{old('nombre_rol',$role->nombre_rol)}}">
                   </div>
                </div>
                <div class="form-group row">
                    <label for="privilegios" class="col-sm-2 col-form-label" >Privilegios del Rol</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="privilegios" name="privilegios">
                            <option>{{$role->privilegios}}</option>
                            <option>alto</option>
                            <option>medio</option>
                            <option>bajo</option>
                        </select>
                    </div>
                </div>
               <div class="form-group row">
                    <div class="col-sm-2"></div>
                   <div>
                        <a href="{{route('roles')}}" class="btn btn-outline-primary btn-lg">Lista Roles</a>
                        <button type="submit" class=" btn btn-outline-success btn-lg registrar">Editar</button>
                   </div>
               </div>
            </form>
        </div>
    </div>
@endsection