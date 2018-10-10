@extends('layouts.menu')
@section('titulo','LISTA DE SUBAREAS DE LA AREA: '.$area->nombre)
@section('contenido')

<Form method="GET" action="{{route('subareas',['area'=>$area])}}">


   
        <!--BUSCADOR --> <!--BUSCADOR -->

         <!--FIN BUSCADOR -->
  

  <div class="centrar col-sm-10 ">
        
                <div class="row">
                    <div class="col-sm-3"></div>
                    
                    <div class=" col-sm-4">
                            @if($subareas->isNotEmpty() or $buscar) 
                                    <input type="search" placeholder="&#xF002; Buscar" style="font-family:Time, FontAwesome" class="form-control" 
                                    name="buscar" autofocus value="{{$buscar}}" autocomplete="off" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">

                             @endif      
                    </div>          
                    <div class="col-4">
                            @if($subareas->isNotEmpty() or $buscar) 
                                    <button class=" btn btn-success pull-left"> Buscar</button>
                             @endif
                    </div>
                    
                    <a href='{{route('registrarSubarea',$area)}}' >
                            <!--class=pull-right  para poner el boton al extremo derecho-->
                            <i class=" fa fa-plus fa-2x fa-3x pull-left" data-toggle="tooltip" data-placement="right" title="Agregar nueva Subarea" ></i>                 
                    </a> 
                </div>
                 
  </div>

  
  <div class="centrar col-sm-10 table-responsive">
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
                <td class="descripcion" style="width: 45%;" >{{$subarea->descripcion}}</td>
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
        <li>No hay Subareas encontradas</li>
    @endif
</div>
</Form>
@endsection