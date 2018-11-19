@extends('layouts.menu')

@section('contenido')
    
    <div class="container">
 
            <div class="row justify-content-center">
                        <div class="list-group  col-10  " >
                            <h2  class="list-group-item active "><strong class="row justify-content-center">Informacion del Perfil</strong></h2>  
                                  
                              <div class="list-group-item">
                                 <h4><b>{{$perfil->titulo}}  </b></h4> 
                                 <p>Titulo</p>  
                              </div>
                              <div class="list-group-item">
                                <p>Descripcion: <strong>{{$perfil->descripcion}}</strong></p> 
                                 
                              </div>
                              <div class="list-group-item">
                                
                                       <strong class="leas text-left" >{{$perfil->modalidad->nombre_mod}}</strong>
                                     <p>Modalidad</p>
                                
                              </div>
                              <div class="list-group-item">
                                <strong>{{$perfil->estado}}</strong>
                                <p>Estado</p>
                             </div>
                             <div class="list-group-item">
                                <strong>{{$perfil->area->nombre}}</strong>
                                <p>Area</p>
                             </div>
                             <div class="list-group-item">
                                <strong>{{$perfil->subarea->nombre}}</strong>
                                <p>SubArea</p>
                             </div> 

                            <div class="list-group-item">
                                <samp>{{$perfil->objetivo_gen}}</samp>
                                <p>Objetivos Generales</p>
                             </div> 
                             <div class="list-group-item">
                                <samp>{{$perfil->objetivo_esp}}</samp>
                                <p>Objetivos Especificos</p>
                             </div> 
                      </div>  
            </div>  
         
           
 
 
    </div >
@endsection