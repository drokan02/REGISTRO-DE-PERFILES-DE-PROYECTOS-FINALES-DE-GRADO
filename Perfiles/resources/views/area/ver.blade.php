@extends('layouts.menu')

@section('contenido')
    


     
        <div class="row justify-content-center">
        <div class="list-group  col-10  " >
             <h2  class="list-group-item active "><strong class="row justify-content-center"> Area</strong></h2>  
             
                      <div class="list-group-item">
                        <h4><b> {{$area->nombre}}</b></h4>
                         <small>area </small>  
                        </div>
                        <div class="list-group-item">
                        <strong>{{$area->codigo}}</strong><br>
                      <small>Codigo</small>
                </div>
                <div class="list-group-item">
                        @if ($area->descripcion)
                         <strong class="leas text-left">{{$area->descripcion}}</strong>
                         <small>Descripcion</small>
                        @else
                        <strong class="lead">No existe descripcion alguna para esa area, para una mejor informacion consulte a su departamento </strong>    
                        @endif
                </div>
                </div>  
        </div>  
        <br/>   
        <div class="row justify-content-center">
                <div class="list-group col-10 ">
         <h3 class=" list-group-item active" > <strong class="row justify-content-center" >SubAreas</strong></h3>
         
       
                        @if ($subareas->isNotEmpty())
                               
                                        @foreach ($subareas as $subarea)
                                        <div class="list-group-item">
                                                <h4><b><li>{{$subarea->nombre}}</li></b></h4>
                                                <small> &emsp;&emsp;&emsp;SubArea</small>
                                        </div>
                                        <div class="list-group-item">
                                                @if ($subarea->descripcion)
                                                        <p> <strong>{{$subarea->descripcion}}</strong></p>
                                                       <small>Descripcion</small>
                                                @else
                                                        <p>No existe descripcion alguna para esa area, para una mejor informacion consulte con el departamento
                                                        de Informatica y Sistemas</p>  
                                                @endif
                                        </div>
                                        @endforeach
                                      
                                        
                                </div>  
                        @else
                                <div class="col-lg-12">
                                        <p>No existe SubAreas pertenecientes a esta Area, para una mejor informacion consulte a su departamento</p>
                                </div>
                            
                        @endif
                       

                      
    </div >

<!--/div-->
   
@endsection