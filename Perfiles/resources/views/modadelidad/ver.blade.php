@extends('layouts.menu')
@section('titulo','Modalidad')
@section('contenido')
    
    <div class="container">
    
         <div class="row justify-content-center">
           <div class="list-group  col-10  " >
               <h2  class="list-group-item active "> <strong class="row justify-content-center">{{$modadelidad->nombre_mod}}</strong></h2>  
                     
                 
                 <div class="list-group-item">
                  <p class="text-primary">Codigo: <strong class="text-muted">{{$modadelidad->codigo_mod}}</strong></p> 
                 </div>
                 <div class="list-group-item">
                    @if ($modadelidad->descripcion_mod)
                    <strong class="text-primary">Descripcion</strong>      
                    <p>{{$modadelidad->descripcion_mod}}</p>
                    
                    @else
                          <strong class="lead">No existe descripcion alguna para esa area, para una mejor informacion consulte a su departamento </strong>    
                    @endif
                 </div>
          </div>  
         </div>  
    </div>
@endsection