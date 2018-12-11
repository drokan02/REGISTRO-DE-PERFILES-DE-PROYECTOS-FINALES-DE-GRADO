@extends('layouts.menu')
@section('titulo','Informacion del Estudiante')
@section('contenido')


    <ul class="nav justify-content-end ">
        <li class="nav-item">
            <a class="nav-link" href="{{route('editarEstudiante',$estudiante)}}">Modifica tus datos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('cambiarContraseñaEstudiante',$estudiante)}}">Cambiar Contraseña</a>
        </li>
    </ul>

    @if(session()->has('actualizarEstudiante'))
        <div class="row mb-3">
            <div class="col alert-success">
                {{session('actualizarEstudiante')}}
            </div>
        </div>
    @endif

    <div class="listaDatos">
       
        <div class="row justify-content-center">
            <div class="list-group  col-10  " >
                 <h2  class="list-group-item active "><strong class="row justify-content-center">Informacion Basica</strong></h2>  
                 
                          <div class="list-group-item">
                            <h4><b>{{$estudiante->nombres}}</b></h4>
                             <p>Nombre de Estudiante </p>  
                            </div>
                            <div class="list-group-item">
                            <strong>{{$estudiante->carrera()->pluck('nombre_carrera')->implode(' - ')}}</strong>
                          <p>Carrera del Carrera</p>
                    </div>
                   
              </div>  
         </div>
                 <br/>
         <div class="row justify-content-center">
            <div class="list-group  col-10  " >
                 <h2  class="list-group-item active "><strong class="row justify-content-center">Informacion Personal</strong></h2>  
                 
                          <div class="list-group-item">
                            <strong><b>{{$estudiante->user_name}}</b></strong>
                             <p>Nombre de Usuario </p>  
                            </div>
                            <div class="list-group-item">
                             <strong>{{$estudiante->email}}</strong>
                              <p>Carrera del Estudiante</p>
                        </div>
                        <div class="list-group-item">
                            <strong>{{$estudiante->telefono}}</strong>
                             <p>Telfono</p>
                       </div>
                   
              </div>  
         </div>
    </div>
@endsection