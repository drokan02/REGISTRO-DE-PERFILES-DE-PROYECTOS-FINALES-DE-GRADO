@extends('layouts.menu')

@section('contenido')
    
<!--iv class=" container jumbotron" style="background-color: white;">
        <div class="">
                        <div class="" style="background-color: #e9ecef; min-height: 50px;">
                                       
                                    
                                
                         </div>
                <div class="row">

                    <div class="col-md-9 offset-md-2">
                        <h4>Areas</h4>
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
</div-->

        <!--div class="alert alert-danger bg-primary" -->
        <div class="row justify-content-center">
        <div class="list-group  col-10  " >
             <h2  class="list-group-item active "><strong class="row justify-content-center"> Area</strong></h2>  
             
                      <div class="list-group-item">
                        <h4><b> {{$area->nombre}}</b></h4>
                         <p>area </p>  
                        </div>
                        <div class="list-group-item">
                        <strong>{{$area->codigo}}</strong>
                      <p>Codigo</p>
                </div>
                <div class="list-group-item">
                        @if ($area->descripcion)
                         <strong class="leas text-left">{{$area->descripcion}}</strong>
                         <p>Descripcion</p>
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
                                                <p> &emsp;&emsp;&emsp;SubArea</p>
                                        </div>
                                        <div class="list-group-item">
                                                @if ($subarea->descripcion)
                                                        <p> <strong>{{$subarea->descripcion}}</strong></p>
                                                       <p>Descripcion</p>
                                                @else
                                                        <p>No existe descripcion alguna para esa area, para una mejor informacion consulte con el departamento
                                                        de Informatica y Sistemas</p>  
                                                @endif
                                        </div>
                                        @endforeach
                                      
                                        
                                </div>  
                        @else
                                <div class="col-lg-12">
                                        <p><font size="4">No existe SubAreas pertenecientes a esta Area, para una mejor informacion consulte a su departamento</font></p>
                                </div>
                            
                        @endif
                       

                      
    </div >

<!--/div-->
   
@endsection