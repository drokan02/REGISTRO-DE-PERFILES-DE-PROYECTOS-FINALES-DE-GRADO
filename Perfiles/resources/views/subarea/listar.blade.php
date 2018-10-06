@extends('layouts.menu')
@section('titulo','LISTA DE SUBAREAS DE LA AREA: '.$area->nombre)
@section('contenido')

<Form method="GET" action="{{route('subareas',['area'=>$area])}}">
   @if($subareas->isNotEmpty())   
        <!--BUSCADOR --> <!--BUSCADOR -->
         @include('complementos.busqueda')
         <!--FIN BUSCADOR -->
  @endif
  <div class="table-responsive">
        
    
    <div class="container col-sm-11">
            
                    <a href='{{route('registrarSubarea',$area)}}' >
                            <!--class=pull-right  para poner el boton al extremo derecho-->
                            <i class=" fa fa-plus fa-2x fa-3x pull-right" data-toggle="tooltip" data-placement="right" title="Agregar nueva Subarea" ></i>                 
                    </a>
    </div>   
    @if($subareas->isNotEmpty())   <!--BUSCADOR -->
      <table class="tabla" id="listaArea">
          <thead class ="columnas">
        <tr>
          <th style="width: 5%; text-align: center;">N°</th>
          <th style="width: 10%;">Codigo</th>
          <th style="width: 25%;">Nombre</th>
          <th style="width: 45%;">Descripcion</th>
          <th style="width: 15%;"></th>
        </tr>
      </thead>
      <tbody>
           
        @foreach ($subareas as $subarea)
            <tr>            
                <td style="text-align: right;">{{$fila++}}</td>
                <td>{{$subarea->codigo}}</td>
                <td>{{$subarea->nombre}}</td>
                <td style="width: 45%;" >{{$subarea->descripcion}}</td>
                <td>
                    <div class="text-center">
                        <a href='{{route('editarSubarea',$subarea->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                            <i class="col-sm-3 fa fa-pencil-square-o fa-2x" ></i>
                         </a>
                        <a href='{{ route('eliminarSubarea',$subarea->id)}}' data-toggle="tooltip" data-placement="right" title="eliminar" 
                            onclick="return confirm('¿Esta seguro de eliminar esta Area?')">
                              <i class="col-sm-3 fa fa-minus-square fa-2x" ></i>
                        </a>
                    </div>
                </td>
            </tr>   
        @endforeach
      </tbody>
    </table>
    {!! $subareas->render() !!}
     @else
        <li>No hay Subareas registradas</li>
    @endif
</div>
</Form>
@endsection