@extends('layouts.menu')
@section('titulo','USUARIOS')
@section('contenido')
    <div class="row ">
        <div class="col-8">
            <h1 class="display-4 font-weight-bold">Lista de Usuarios</h1>
        </div>
        <div class="col p-3 mt-1">
            <a href="{{route('crearUsuario')}}" class="btn btn-link btn-lg" data-toggle="tooltip" data-placement="right" title="Añadir"><i class="fa fa-plus"></i></a>
            <a href="{{route('roles')}}" class="btn btn-link btn-lg">Roles</a>
        </div>
    </div>
    @if($users->isNotEmpty())
        <table class="table table-hover table-bordered text-center">
            <thead class="thead-dark">
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
                    <td>{{$us->role->nombre_rol}}</td>
                    <td>
                        <form method="POST" action="{{route('eliminarUsuario',$us)}}">
                            {{method_field('DELETE')}}
                            {!! csrf_field() !!}
                            <a href="{{route('detalleUsuario',['id'=>$us->id])}}" class="btn btn-link btn-lg" data-toggle="tooltip" data-placement="right" title="Datos Usuario"><i class="fa fa-eye"></i></a>
                            <a href="{{route('editarUsuario',$us)}}" class="btn btn-link btn-lg" data-toggle="tooltip" data-placement="right" title="Editar"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-link btn-lg" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <li>No hay usuarios</li>
    @endif
@endsection
