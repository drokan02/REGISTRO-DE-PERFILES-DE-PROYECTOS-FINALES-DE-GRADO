@extends('layouts.menu')
@section('titulo','LISTA DE CARRERAS')
@section('contenido')
   
<form method="GET" action="{{route('carreras')}}" >
    <div class="container">
        <div class="form-group row">
            <div class="col-sm-4"></div>
            <div class=" col-4">  
                        @if($carreras->isNotEmpty() or $buscar)      
                            <input type="search" placeholder="&#xF002; Buscar" style="font-family:Time, FontAwesome" class="form-control buscar" 
                            name="buscar" autofocus value="{{$buscar}}" autocomplete="off" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">   
                            @endif
                </div>          
            <div class="col-sm-0">
                        @if($carreras->isNotEmpty() or $buscar) 
                            <button class=" btn btn-success pull-left"> Buscar</button>
                            @endif
            </div>
            <div class="col-sm-3">
                        <a href='{{route('crearCarrera')}}' >
                                        <!--class=pull-right  para poner el boton al extremo derecho-->
                                        <i class=" fa fa-plus fa-2x fa-3x pull-right" data-toggle="tooltip" data-placement="right" title="Agregar nueva Carrera" ></i>                 
                            </a> 
            </div>
        </div>
                
    </div> 
  <div class="container col-sm-8 listaDatos">       
            @if($carreras->isNotEmpty())
                <table class="table text-center">
                    <thead class="thead thead-primary">
                    <tr class="tr">
                        <th >#</th>
                        <th >Codigo Carrera</th>
                        <th >Carrera</th>
                        <th >Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="tbody">
                    @foreach($carreras as $carrera)
                        <tr class="tr">
                            <td scope="row">{{$carrera->id}}</td>
                            <td>{{$carrera->codigo_carrera}}</td>
                            <td>{{$carrera->nombre_carrera}}</td>
                            <td>
                                <div class=" dropleft text-center">
                                    <a href="#" data-toggle="dropdown"  data-placement="right" title="opsiones">
                                            <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <a href="{{route('editarCarrera',$carrera)}}" class="dropdown-item" >
                                                    <h5><i class="col-sm-3 fa fa-pencil-square-o iconMenu">&nbsp;&nbsp;&nbsp;Editar</i></h5>
                                             </a> 
                                            <a href='{{ route('areasCarrera',$carrera)}}' class="dropdown-item" >
                                                        <h5><i class="col-sm-3 fa fa-plus iconMenu"  >&nbsp;&nbsp;&nbsp;Agregar Area</i></h5>
                                            </a>  
                                            <form method="POST" action="{{route('eliminarCarrera',$carrera)}}">
                                                    {{method_field('DELETE')}}
                                                    {!! csrf_field() !!}
                                                    <button class="dropdown-item"  type="submit">
                                                        <h5> <i class="col-sm-3 fa fa-minus-square iconMenu" >&nbsp;&nbsp;&nbsp;Eliminar</i></h5>
                                                    </button>
                                            </form>                                                    
                                    </div>
                                </div> 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <li>No hay Carreras</li>
            @endif
           
       </div>
</form>
@endsection