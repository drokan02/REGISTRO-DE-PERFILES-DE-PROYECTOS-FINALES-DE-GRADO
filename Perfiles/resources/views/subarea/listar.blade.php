@extends('layouts.menu')
@section('titulo','LISTA DE SUBAREAS')
@section('contenido')

<Form method="GET" action="{{route('subareas',['area'=>$area])}}">
    <!--BUSCADOR -->
   @include('complementos.busqueda')
   <!--FIN BUSCADOR -->
  
  <div class="table-responsive">
        
    
    <div class="col-sm-12">
            <h4> <b>Subareas pertenecientes a la Area :</b>  {{$area->nombre}}
                    <a href='{{route('registrarSubarea',$area)}}' >
                            <i class=" fa fa-plus fa-2x fa-2x pull-right" data-toggle="tooltip" data-placement="right" title="Agregar nueva Subarea" ></i>                 
                    </a>
            </h4>
    </div>   
      
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
</div>
</Form>
@endsection