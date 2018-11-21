@extends('layouts.menu')
@section('titulo','DOCENTE')
@section('contenido')
    
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
@endsection