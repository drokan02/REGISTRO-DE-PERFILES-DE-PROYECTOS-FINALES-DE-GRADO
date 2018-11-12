@extends('layouts.menu')
@section('titulo','DOCENTE')
@section('contenido')
    
    <div class="container">
 
            <div class="row justify-content-center">
                        <div class="list-group  col-10  " >
                            <h2  class="list-group-item active "><strong class="row justify-content-center">Informacion Personal</strong></h2>  
                                  
                              <div class="list-group-item">
                                 <h4><b>{{$docente->profesional->nombre_prof}} {{$docente->profesional->ap_pa_prof}}  {{$docente->profesional->ap_ma_prof}} </b></h4> 
                                 <p>Nombre Completo</p>  
                              </div>
                              <div class="list-group-item">
                                 <strong>{{$docente->profesional->ci_prof}}</strong>
                                 <p>Cedula de Indentidad</p>
                              </div>
                              <div class="list-group-item">
                                
                                       <strong class="leas text-left" >{{$docente->profesional->direc_prof}}</strong>
                                     <p>Direccion</p>
                                
                              </div>
                      </div>  
            </div>  
            <br/>
            <div class="row justify-content-center">
                <div class="list-group  col-10  " >
                    <h2  class="list-group-item active "><strong class="row justify-content-center">Informacion Academica</strong></h2>  
                          
                      <div class="list-group-item">
                         <strong>{{$docente->codigo_sis}}</strong> 
                         <p>Codigo Sis</p>  
                      </div>
                      <div class="list-group-item">
                         <strong>{{$docente->cargahoraria->carga_horaria}}</strong>
                         <p>Carga Horaria</p>
                      </div>
                      <div class="list-group-item">
                        
                               <strong class="leas text-left" >{{$docente->profesional->carrera->nombre_carrera}}</strong>
                             <p>Carrera</p>
                        
                      </div>
                      @foreach ($docente->profesional->areas as $area)
                      <div class="list-group-item">
                        <strong>{{$area->nombre}}</strong>
                        <p>Area</p>
                      </div>
                      @if ($docente->profesional->areas->count() < 2)
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
                 <strong>{{$docente->profesional->telef_prof}}</strong> 
                 <p>Telefono</p>  
              </div>
              <div class="list-group-item">
                 <strong>{{$docente->profesional->correo_prof}}</strong>
                 <p>Correo</p>
              </div>
             
 </div>  
</div>  
 
    </div >
@endsection