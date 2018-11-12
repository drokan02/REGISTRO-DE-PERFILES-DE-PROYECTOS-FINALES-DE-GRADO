@extends('layouts.menu')
@section('titulo','DOCENTE')
@section('contenido')
    
    <div class="container">
 
            <div class="row justify-content-center">
                        <div class="list-group  col-10  " >
                            <h2  class="list-group-item active "><strong class="row justify-content-center">Informacion Personal</strong></h2>  
                                  
                              <div class="list-group-item">
                                 <h4><b>{{$profesional->nombre_prof}} {{$profesional->ap_pa_prof}}  {{$profesional->ap_ma_prof}} </b></h4> 
                                 <p>Nombre Completo</p>  
                              </div>
                              <div class="list-group-item">
                                 <strong>{{$profesional->ci_prof}}</strong>
                                 <p>Cedula de Indentidad</p>
                              </div>
                              <div class="list-group-item">
                                
                                       <strong class="leas text-left" >{{$profesional->direc_prof}}</strong>
                                     <p>Direccion</p>
                                
                              </div>
                      </div>  
            </div>  
            <br/>
            <div class="row justify-content-center">
                <div class="list-group  col-10  " >
                    <h2  class="list-group-item active "><strong class="row justify-content-center">Informacion Academica</strong></h2>  
                     
                      <div class="list-group-item">
                        
                               <strong class="leas text-left" >{{$profesional->carrera->nombre_carrera}}</strong>
                             <p>Carrera</p>
                        
                      </div>
                      @foreach ($profesional->areas as $area)
                      <div class="list-group-item">
                        <strong>{{$area->nombre}}</strong>
                        <p>Area</p>
                      </div>
                      @if ($profesional->areas->count() < 2)
                      <div class="list-group-item">
                              <p>SubArea</p>
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
                 <strong>{{$profesional->telef_prof}}</strong> 
                 <p>Telefono</p>  
              </div>
              <div class="list-group-item">
                 <strong>{{$profesional->correo_prof}}</strong>
                 <p>Correo</p>
              </div>
             
 </div>  
</div>  
 
    </div >
@endsection