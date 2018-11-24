@extends('layouts.menu')
@section('titulo','DOCENTE')
@section('contenido')
    
    <div class="container">
 
            <div class="row justify-content-center">
                        <div class="list-group  col-10  " >
                            <h2  class="list-group-item active "><strong class="row justify-content-center">Informacion Personal</strong></h2>  
                                  
                              <div class="list-group-item">
                                 <h4><b>{{$profesional->nombre_prof}} {{$profesional->ap_pa_prof}}  {{$profesional->ap_ma_prof}} </b></h4> 
                                 <small>Nombre Completo</small>  
                              </div>
                              <div class="list-group-item">
                                 <strong>{{$profesional->ci_prof}}</strong><br>
                                 <small>Cedula de Indentidad</small>
                              </div>
                              <div class="list-group-item">
                                
                                       <strong class="leas text-left" >{{$profesional->direc_prof}}</strong><br>
                                     <small>Direccion</small>
                                
                              </div>
                      </div>  
            </div>  
            <br/>
            <div class="row justify-content-center">
                <div class="list-group  col-10  " >
                    <h2  class="list-group-item active "><strong class="row justify-content-center">Informacion Academica</strong></h2>  
                     
                      <div class="list-group-item">
                        
                               <strong class="leas text-left" >{{$profesional->carrera->nombre_carrera}}</strong><br>
                             <small>Carrera</small>
                        
                      </div>
                      @foreach ($profesional->areas as $area)
                      <div class="list-group-item">
                        <strong>{{$area->nombre}}</strong><br>
                        <small>Area</small>
                      </div>
                      @if ($profesional->areas->count() < 2)
                      <div class="list-group-item"><br>
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
                 <strong>{{$profesional->telef_prof}}</strong><br> 
                 <small>Telefono</small>  
              </div>
              <div class="list-group-item">
                 <strong>{{$profesional->correo_prof}}</strong><br>
                 <small>Correo</small>
              </div>
             
 </div>  
</div>  
 
    </div >
@endsection