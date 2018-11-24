@extends('layouts.menu')
@section('titulo','AREA')
@section('contenido')
    
<div class=" container jumbotron" style="background-color: white;">
        <div class="">
                        <div class="" style="background-color: #e9ecef; min-height: 50px;">
                                       
                                    
                                
                         </div>
                <div class="row">

                    <div class="col-md-9 offset-md-2">
                        <h4>Latest News</h4>
                        <ul class="timeline">
                            <li>
                                
                                <div class="form-group col-sm-12">
                                        <a target="_blank" href="https://www.totoprayogo.com/#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Web Design</a>
                                        <a href="#" class="float-right">21 March, 2014</a>
                                        <div class=" offset-md-1">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                                                         scelerisque diam non nisi semper, et elementum lorem ornare.
                                                         Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                                        </div>
                                </div>
                            </li>
                            <li>
                                        <div class="form-group col-sm-12">
                                                        <a target="_blank" href="https://www.totoprayogo.com/#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Web Design</a>
                                                        <a href="#" class="float-right">21 March, 2014</a>
                                                        <div class=" offset-md-1">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                                                                         scelerisque diam non nisi semper, et elementum lorem ornare.
                                                                         Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                                                        </div>
                                                </div>
                            </li>
                            <li>
                                        <div class="form-group col-sm-12">
                                                        <a target="_blank" href="https://www.totoprayogo.com/#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;New Web Design</a>
                                                        <a href="#" class="float-right">21 March, 2014</a>
                                                        <div class=" offset-md-1">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                                                                         scelerisque diam non nisi semper, et elementum lorem ornare.
                                                                         Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                                                        </div>
                                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>
</div>
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