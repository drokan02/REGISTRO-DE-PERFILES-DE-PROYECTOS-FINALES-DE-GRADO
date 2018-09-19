@extends('layouts.menu')
@section('titulo','USUARIOS')
@section('contenido')
    <div class="row ">
        <div class="col-8">
            <h1 class="display-4 font-weight-bold">Lista de Usuarios</h1>
        </div>
        <div class="col p-3 mt-1">
            <a href="#" class="btn btn-link">crear usuario</a>
            <a href="{{route('roles')}}" class="btn btn-link">Roles</a>
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
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <li>No hay usuarios</li>
    @endif


@endsection
