@extends('layouts.menu')
@section('titulo','MODALIDAD')
@section('contenido')
    
    <div class="container">
   
         <div class="row justify-content-center">
           <div class="list-group  col-10  " >
               <h2  class="list-group-item active "><strong class="row justify-content-center">Modalidad</strong></h2>  
                     
                 <div class="list-group-item">
                    <h4><b>{{$modadelidad->nombre_mod}}</b></h4> 
                    <p>Nombre </p>  
                 </div>
                 <div class="list-group-item">
                    <strong>{{$modadelidad->codigo_mod}}</strong>
                    <p>Codigo</p>
                 </div>
                 <div class="list-group-item">
                    @if ($modadelidad->descripcion_mod)
                          <strong class="leas text-left" style="font-size:25px>{{$modadelidad->descripcion_mod}}</strong>
                          <p>Descripcion</p>
                    @else
                          <strong class="lead">No existe descripcion alguna para esa area, para una mejor informacion consulte a su departamento </strong>    
                    @endif
                 </div>
          </div>  
         </div>  
    </div>
@endsection