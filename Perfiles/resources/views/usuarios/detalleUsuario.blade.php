@extends('layouts.menu')
@section('titulo','Informacion del usuario')
@section('contenido')


    <ul class="nav justify-content-end ">
        <li class="nav-item">
            <a class="nav-link" href="{{route('editarUsuario',$user)}}">Modifica tus datos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('cambiarContraseña',$user)}}">Cambiar Contraseña</a>
        </li>
    </ul>




   <div class="listaDatos">
        <table class="table">
            <thead class="thead">
                <tr class="tr">
                    <th class="h1 " scope="col">Informacion Basica</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="tbody">
                <tr class="tr">
                    <td>Nombre de Usuario: </td>
                    <td>{{$user->user_name}}</td>
                </tr>
                <tr class="tr">
                    <td>Rol del usuario</td>
                    <td>{{$user->roles->pluck('nombre_rol')->implode(' - ')}}</td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <thead class="thead">
            <tr class="tr">
                <th class="h1" scope="col">Informacion Personal</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="tbody">
            <tr class="tr">
                <td>Nombre del Usuarios: </td>
                <td>{{$user->name}}</td>
            </tr>
            <tr class="tr">
                <td>Correo Electronico</td>
                <td>{{$user->email}}</td>
            </tr>
            <tr class="tr">
                <td>Nombre de Usuario: </td>
                <td>{{$user->user_name}}</td>
            </tr>
            </tbody>
        </table>
   </div>
@endsection