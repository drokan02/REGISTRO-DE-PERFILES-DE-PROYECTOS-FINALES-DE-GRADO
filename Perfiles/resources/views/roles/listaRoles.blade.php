@extends('layouts.menu')
@section('titulo','ROLES')
@section('contenido')
    <div class="row">
        <div class="col-9">
            <h1 class="display-4 font-weight-bold">Lista de Roles del Sistema</h1>
        </div>
        <div class="col  p-3 mt-1">
            <a href="{{route('crearRol')}}" class="btn btn-link btn-lg" data-toggle="tooltip" data-placement="right" title="añadir"><i class="fa fa-plus"></i></a>
            <a href="{{route('usuarios')}}" class="btn btn-link btn-lg" data-toggle="tooltip" data-placement="right" title="Usuarios"><i class="fa fa-users"></i></a>
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
        <table class="table table-hover table-bordered-primary text-center">
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
                            <a href="{{route('editarRol',$rol)}}" class="btn btn-link btn-lg" data-toggle="tooltip" data-placement="right" title="Editar"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-link btn-lg" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <li>No hay Roles</li>
    @endif

@endsection