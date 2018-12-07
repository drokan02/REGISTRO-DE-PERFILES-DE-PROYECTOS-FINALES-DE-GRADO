@extends('layouts.menu')
@section('titulo','DATOS DOCENTE')
@section('contenido')
<<<<<<< HEAD
    
    <div class="container">
 
            <div class="row justify-content-center">
                        <div class="list-group  col-10  " >
                            <h2  class="list-group-item active "><strong class="row justify-content-center">Informacion Personal</strong></h2>  
                                  
                              <div class="list-group-item">
                                 <h4><b>{{$docente->profesional->nombre_prof}} {{$docente->profesional->ap_pa_prof}}  {{$docente->profesional->ap_ma_prof}} </b></h4> 
                                 <small>Nombre Completo</small>  
                              </div>
                              <div class="list-group-item">
                                    
                                 <strong>{{$docente->profesional->ci_prof}}</strong><br>
                                 <small>Cedula de Indentidad</small>
                              </div>
                              <div class="list-group-item">
                                
                                       <strong class="leas text-left" >{{$docente->profesional->direc_prof}}</strong><br>
                                     <small>Direccion</small>
                                
                              </div>
                      </div>  
            </div>  
            <br/>
            <div class="row justify-content-center">
                <div class="list-group  col-10  " >
                    <h2  class="list-group-item active "><strong class="row justify-content-center">Informacion Academica</strong></h2>  
                          
                      <div class="list-group-item">
                         <strong>{{$docente->codigo_sis}}</strong><br>
                         <small>Codigo Sis</small>  
                      </div>
                      <div class="list-group-item">
                         <strong>{{$docente->cargahoraria->carga_horaria}}</strong><br>
                         <small>Carga Horaria</small>
                      </div>
                      <div class="list-group-item">
                        
                               <strong class="leas text-left" >{{$docente->profesional->carrera->nombre_carrera}}</strong><br>
                             <small>Carrera</small>
                        
                      </div>
                      @foreach ($docente->profesional->areas as $area)
                      <div class="list-group-item">
                        <strong>{{$area->nombre}}</strong><br>
                        <small>Area</small>
                      </div>
                      @if ($docente->profesional->areas->count() < 2)
                      <div class="list-group-item">
                              <small>SubArea</small>
                      </div>
                      @endif
                     
              @endforeach
         </div>  
 </div>  
 <br/>
 <div class="row justify-content-center">
        <div class="list-group  col-10  " >
            <h2  class="list-group-item active "><strong class="row justify-content-center">Informacion de Contacto</strong></h2>  
                  
              <div class="list-group-item">
                 <strong>{{$docente->profesional->telef_prof}}</strong><br> 
                 <small>Telefono</small>  
              </div>
              <div class="list-group-item">
                 <strong>{{$docente->profesional->correo_prof}}</strong><br>
                 <small>Correo</small>
              </div>
             
 </div>  
</div>  
 
    </div >
=======

    @if(auth()->user()->hasRoles(['docente','administrador']))
        <ul class="nav justify-content-end ">
         {{--   @if($docente->perfiles->toArray() != [])--}}
            <li class="nav-item">
                <a class="nav-link" href="{{route('tutoriaDocente',$docente)}}">Tutoria</a>
            </li>
         {{--   @endif   --}}
            <li class="nav-item">
                <a class="nav-link" href="{{route('editarDocente',$docente)}}">Modifica tus datos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('cambiarContraseñaDocente',$docente)}}">Cambiar Contraseña</a>
            </li>
        </ul>
    @endif

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
                <td>Nombre de Docente: </td>
                <td>{{$profesional->nombre_prof.' '.$profesional->ap_pa_prof.' '.$profesional->ap_ma_prof}}</td>

            </tr>
            @if(auth()->user()->hasRoles(['docente','administrador']))
                <tr class="tr">
                    <td>Codigo SIS</td>
                    <td>{{$docente->codigo_sis}}</td>
                </tr>
            @endif
            <tr class="tr">
                <td>Titulo Profesional</td>
                <td>{{$profesional->titulo()->pluck('nombre')->implode(' - ')}}</td>
            </tr>
            <tr class="tr">
                <td>Carrera del Docente</td>
                <td>{{$docente->profesional()->first()->carrera()->pluck('nombre_carrera')->implode(' - ')}}</td>
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
                <td>Nombre : </td>
                <td>{{$profesional->nombre_prof.' '.$profesional->ap_pa_prof.' '.$profesional->ap_ma_prof}}</td>
            </tr>
            <tr class="tr">
                <td>Correo Electronico</td>
                <td>{{$profesional->correo_prof}}</td>
            </tr>
            @if(auth()->user()->hasRoles(['docente','administrador']))
                <tr class="tr">
                    <td>Carnet Identidad: </td>
                    <td>{{$profesional->ci_prof}}</td>
                </tr>
            @endif
            <tr class="tr">
                <td>Area: </td>
                <td>{{$profesional->areas()->pluck('nombre')->implode(' - ')}}</td>
            </tr>
            <tr class="tr">
                <td>Carga Horaria: </td>
                <td>{{$docente->cargahoraria()->pluck('carga_horaria')->implode(' - ')}}</td>
            </tr>
            <tr class="tr">
                <td>Telefono: </td>
                <td>{{$profesional->telef_prof}}</td>
            </tr>
            <tr class="tr">
                <td>direccion: </td>
                <td>{{$profesional->direc_prof}}</td>
            </tr>
            </tbody>
        </table>
    </div>
>>>>>>> d7cb1791a7afca80985417b6ea6382cf8217a14d
@endsection