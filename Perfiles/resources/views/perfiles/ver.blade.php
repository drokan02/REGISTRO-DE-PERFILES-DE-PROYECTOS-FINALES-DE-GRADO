@extends('layouts.menu')
@section('titulo','PERFIL')
@section('contenido')
    
    <div class="container">
 
            <div class="row justify-content-center">
                     <div class="list-group  col-10  " >
                            <h2  class="list-group-item active display-4"><strong class="row justify-content-center">{{$perfil->titulo}}</strong></h2>  
                              <div class="list-group-item">
                                    <strong>{{$perfil->estudiantes->pluck('nombres')->implode(' - ')}}</strong><br>
                                    <small>Auto(res)</small><hr>
                                    <strong>{{$perfil->area->nombre}}</strong><br>
                                    <small>Area</small><hr>
                                    <strong>{{$perfil->subarea->nombre}}</strong><br>
                                <p>SubArea</p><hr>
                                    <strong class="leas text-left" >{{$perfil->modalidad->nombre_mod}}</strong><br>
                                    <small>Modalidad</small><hr>
                                    <strong> {{$perfil->tutor[0]->ap_pa_prof}}
                                          {{$perfil->tutor[0]->ap_ma_prof}}
                                          {{$perfil->tutor[0]->nombre_prof}}</strong><br>
                                    <small>Tutor</small><hr>
                                    <strong>{{$perfil->estado}}</strong><br>
                                    <small>Estado</small><hr>
                                <strong>{{$perfil->objetivo_gen}}</strong><br>
                                <small>Objetivos Generales</small>
                             </div> 
                              
                     
                             <div class="list-group-item">
                                 <div class="panel panel-default bg-primary">
                                       <div class="panel-body">
                                             <h3 class=" text-white"><u>Objetivos Especificos</u></h3><br>
                                       </div>
                                     </div>
                                     <small>{{$perfil->objetivo_esp}}</small>
                             </div> 
                             <div class="list-group-item">
                                 <div class="panel panel-default bg-primary">
                                       <div class="panel-body">
                                             <h3 class=" text-white"><u>Descripcion</u></h3><br>
                                       </div>
                                     </div>
                                     <small>{{$perfil->descripcion}}</small>
                             </div>      
                      </div>  
            </div>  
    </div >
@endsection