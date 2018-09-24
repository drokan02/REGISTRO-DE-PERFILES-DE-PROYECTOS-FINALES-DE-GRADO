@extends('layouts.menu')
@section('titulo','Informacion del usuario')
@section('contenido')
    <h1>Detalle del Usuario</h1>
    <table class="table">
        <thead>
            <tr>
                <th class="h1 " scope="col">Informacion Basica</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nombre de Usuario: </td>
                <td>{{$user->user_name}}</td>
            </tr>
            <tr>
                <td>Rol del usuario</td>
                <td>{{$user->roles->pluck('nombre_rol')->implode(' - ')}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <thead>
        <tr>
            <th class="h1" scope="col">Informacion Personal</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Nombre del Usuarios: </td>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <td>Correo Electronico</td>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <td>Nombre de Usuario: </td>
            <td>{{$user->user_name}}</td>
        </tr>
        </tbody>
    </table>

@endsection