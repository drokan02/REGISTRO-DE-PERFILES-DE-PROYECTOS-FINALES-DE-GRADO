@extends('layouts.menu')
@section('titulo','Informacion del usuario')
@section('contenido')


    <ul class="nav justify-content-end ">
        <li class="nav-item">
            <a class="nav-link" href="{{route('editarUsuario',$user)}}"><strong class="text-red" >Modifica tus datos </strong></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('cambiarContraseña',$user)}}"><strong class="text-red" > Contraseña</strong> </a>
        </li>
    </ul>



        <div class="row justify-content-center">
                <div class="list-group  col-10  " >
                     <h2  class="list-group-item active "><strong class="row justify-content-center">{{$user->name}}</strong></h2>  
                     
                
                                <div class="list-group-item">
                                <strong>{{$user->email}}</strong><br>
                              <small>Correo Electronico</small>
                        </div>
                        <div class="list-group-item">
                                <strong> {{$user->user_name}}</strong><br>
                                 <small>Nombre de Usuario </small>  
                                </div>
                                <!--div class="list-group-item">
                                        <strong>{{$user->roles->pluck('nombre_rol')->implode(' - ')}}</strong>
                                      <p>Rol del usuario</p>
                                </div-->
                        </div>  
                </div>
@endsection