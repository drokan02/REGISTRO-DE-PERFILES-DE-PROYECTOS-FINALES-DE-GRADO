@extends('layouts.menu')
@section('titulo','AREA')
@section('contenido')
    
    <div class="container scroll">
        
        <div class="jumbotron">
                        <h1>AREA: {{$area->nombre}}</h1>
                        @if ($area->descripcion)
                        <p class="lead">{{$area->Descripcion}}</p>   
                        @else
                        <p class="lead">No existe descripcion alguna para esa area, para una mejor informacion consulte a su departamento </p>    
                        @endif
                
         </div>
         <h3><b>Lista de SubAreas</b></h3><br>

        <div class=" row marketing">
                        @if ($subareas->isNotEmpty())
                                <div class="col-lg-12">
                                        @foreach ($subareas as $subarea)
                                                <h4><b>{{$subarea->nombre}}</b></h4>
                                                @if ($subarea->descripcion)
                                                        <p>{{$subarea->descripcion}}</p>  
                                                @else
                                                        <p>No existe descripcion alguna para esa area, para una mejor informacion consulte con el departamento
                                                        de Informatica y Sistemas</p>  
                                                @endif
                                        @endforeach
                                        
                                </div>  
                        @else
                                <div class="col-lg-12">
                                        <p><font size="4">No existe SubAreas pertenecientes a esta Area, para una mejor informacion consulte a su departamento</font></p>
                                </div>
                            
                        @endif
                       

                      
    </div >
@endsection