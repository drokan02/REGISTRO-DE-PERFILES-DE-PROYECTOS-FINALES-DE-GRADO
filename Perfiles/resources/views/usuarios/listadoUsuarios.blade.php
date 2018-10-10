@extends('layouts.menu')
@section('titulo','LISTA DE USUARIOS DEL SISTEMA')
@section('contenido')
    <div class="row mb-3">
        <div class="col-8 offset-1">
            <form method="GET" action="{{route('usuarios')}}" class="form-inline">
                <div class="form-group">
                    <input class="form-control" name="name" placeholder="Buscar">
                    <button type="submit" class=" btn btn-success">Buscar</button>
                </div>
            </form>
        </div>
        <div class="col">
            <a href="{{route('crearUsuario')}}" class="btn btn-link" data-toggle="tooltip" data-placement="right" title="Añadir"><i class="fa fa-user-plus fa-2x"></i></a>
            <a href="{{route('roles')}}" class="btn btn-link btn-lg">Roles</a>
        </div>
    </div>
    @if($users->isNotEmpty())

        <div class="container col-sm-8">
            <table class="table table-hover table-bordered-primary text-center">
                <thead class="thead-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Rol Usuario</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $us)
                    <tr>
                        <th scope="row">{{$us->id}}</th>
                        <td>{{$us->name}}</td>
                        <td>{{$us->roles->pluck('nombre_rol')->implode(' - ')}}</td>
                        <td>
                            <form method="POST" action="{{route('eliminarUsuario',$us)}}">
                                {{method_field('DELETE')}}
                                {!! csrf_field() !!}
                                <a href="{{route('detalleUsuario',['id'=>$us->id])}}" class="btn btn-link" data-toggle="tooltip" data-placement="right" title="Datos Usuario"><i class="fa fa-eye fa-2x"></i></a>
                                <a href="{{route('editarUsuario',$us)}}" class="btn btn-link" data-toggle="tooltip" data-placement="right" title="Editar"><i class="fa fa-edit fa-2x"></i></a>
                                <button class="btn btn-link" type="submit"><i class="fa fa-trash fa-2x"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <li>No hay usuarios</li>
    @endif
@endsection
