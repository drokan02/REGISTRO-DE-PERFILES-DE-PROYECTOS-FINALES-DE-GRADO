@extends('layouts.menu')
@section('titulo','LISTA DE SUBAREAS DE LA AREA: '.$area->nombre)
@section('contenido')

<Form method="GET" action="{{route('subareas',['area'=>$area])}}">


    <div class="container">
        <div class="form-group row">
            <div class="col-sm-4"></div>
            <div class=" col-4">  
                        @if($subareas->isNotEmpty() or $buscar)      
                            <input type="search" placeholder="&#xF002; Buscar" style="font-family:Time, FontAwesome" class="form-control buscar" 
                            name="buscar" autofocus value="{{$buscar}}" autocomplete="off" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">   
                            @endif
                </div>          
            <div class="col-sm-0">
                        @if($subareas->isNotEmpty() or $buscar) 
                            <button class=" btn btn-success pull-left"> Buscar</button>
                            @endif
            </div>
            <div class="col-sm-3">
                        <a href='{{route('registrarSubarea',$area)}}' >
                                        <!--class=pull-right  para poner el boton al extremo derecho-->
                                        <i class=" fa fa-plus fa-2x fa-3x pull-right" data-toggle="tooltip" data-placement="right" title="Agregar nueva Subarea" ></i>                 
                            </a> 
            </div>
        </div>
                
    </div> 

        <!--BUSCADOR --> <!--BUSCADOR -->

         <!--FIN BUSCADOR -->
  

  
  <div class="centrar col-sm-10 table-responsive listaDatos">
    @if($subareas->isNotEmpty())   <!--BUSCADOR -->
      <table class="table" id="listaArea">
          <thead class ="thead">
        <tr class="tr">
          <th style="width: 5%; text-align: center;">N°</th>
          <th style="width: 10%;">Codigo</th>
          <th style="width: 25%;">Nombre</th>
          <th style="width: 45%;">Descripcion</th>
          <th style="width: 10%;">Acciones</th>
        </tr>
      </thead>
      <tbody class="tbody">
           
        @foreach ($subareas as $subarea)
            <tr class="tr">            
                <td style="text-align: right;">{{$fila++}}</td>
                <td>{{$subarea->codigo}}</td>
                <td>{{$subarea->nombre}}</td>
                <td class="descripcion" style="width: 45%;" >{{$subarea->descripcion}}</td>

                <td>
                    <div class=" dropleft text-center">
                            <a href="#" data-toggle="dropdown"  data-placement="right" title="opciones">
                                    <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a href='{{route('editarSubarea',$subarea->id)}}' class="dropdown-item" href="#">
                                            <h5><i class="col-sm-3 fa fa-pencil-square-o iconMenu">&nbsp;&nbsp;&nbsp;Editar</i></h5>
                                    </a>
                                    <a href='{{ route('eliminarSubarea',$subarea->id)}}' class="dropdown-item eliminar" href="#">
                                            <h5> <i class="col-sm-3 fa fa-minus-square iconMenu" >&nbsp;&nbsp;&nbsp;Eliminar</i></h5>
                                    </a>                                                        
                            </div>
                    </div>  
                </td>
            </tr>   
        @endforeach
      </tbody>
    </table>
    {!! $subareas->render() !!}
     @else
        <li>No hay Subareas encontradas</li>
    @endif
</div>
</Form>
@endsection