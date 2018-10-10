@extends('layouts.menu')
@section('titulo','Lista de Roles del Sistema')
@section('contenido')
    <div class="row mb-3">
        <div class="col-8 offset-1">
            <form method="GET" action="{{route('roles')}}" class="form-inline">
                <input class="form-control" name="name" placeholder="Buscar">
                <button type="submit" class=" btn btn-success">Buscar</button>
            </form>
        </div>
        <div class="col ">
            <a href="{{route('crearRol')}}" class="btn btn-link" data-toggle="tooltip" data-placement="right" title="añadir"><i class="fa fa-plus fa-2x"></i></a>
            <a href="{{route('usuarios')}}" class="btn btn-link" data-toggle="tooltip" data-placement="right" title="Usuarios"><i class="fa fa-users fa-2x"></i></a>
        </div>
    </div>
    <div class="alert-danger">
        @foreach($errors->all() as $errors)
            <ul>
                <li>{{$errors}}</li>
            </ul>
        @endforeach
    </div>
    @if($roles->isNotEmpty())
    
       <div class="container col-sm-8">
            <table class="table-hover table-bordered-primary text-center">
                <thead class="thead-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Rol</th>
                    <th scope="col">privilegios</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $rol)
                    <tr>
                        <th scope="row">{{$rol->id}}</th>
                        <td>{{$rol->nombre_rol}}</td>
                        <td>{{$rol->privilegios}}</td>
                        <td>
                            <form method="POST" action="{{route('eliminarRol',$rol)}}">
                                {{method_field('DELETE')}}
                                {!! csrf_field() !!}
                                <a href="{{route('editarRol',$rol)}}" class="btn btn-link" data-toggle="tooltip" data-placement="right" title="Editar"><i class="fa fa-edit fa-2x"></i></a>
                                <button class="btn btn-link" type="submit"><i class="fa fa-trash fa-2x"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div >
    @else
        <li>No hay Roles</li>
    @endif

@endsection