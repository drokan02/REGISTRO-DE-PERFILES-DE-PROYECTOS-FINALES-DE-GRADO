@extends('layouts.menu')
@section('titulo','LISTAR AREAS')
@section('contenido')


<Form method="GET" action="{{route('Areas')}}" >
    @if($areas->isNotEmpty()) <!--BUSCADOR -->
    <div class="centrar col-sm-10 ">
        
            <div class="row">
                <div class="col-sm-3"></div>
                
                <div class=" col-sm-4">       
                                <input type="search" placeholder="&#xF002; Buscar" style="font-family:Time, FontAwesome" class="form-control" 
                                name="buscar" autofocus value="{{$buscar}}" autocomplete="off" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">   
                </div>          
                <div class="col-4">
                                <button class=" btn btn-success pull-left"> Buscar</button>
                </div>
            </div>
             
    </div>
   <!--FIN BUSCADOR -->
   @include('complementos.error')
  <div  class="centrar table-responsive col-sm-10 ">
      <table class="tabla" id="listaArea">
          <thead class ="columnas">
        <tr>
          <th style="width: 5%; text-align: center;">N°</th>
          <th style="width: 10%;">Codigo</th>
          <th style="width: 25%;">Nombre</th>
          <th style="width: 45%; ">Descripcion</th>
          <th style="width: 15%;"></th>
        </tr>
      </thead>
      <tbody>
           
        @foreach ($areas as $area)
            <tr>
                
                <td style="text-align: right;">{{$fila++}}</td>
                <td>{{$area->codigo}}</td>
                <td>{{$area->nombre}}</td>
                <td style="width: 45%;" >{{$area->descripcion}}</td>
                <td>
                    <div class="text-center">
                        <a href='{{ route('verArea',$area->id)}}' data-toggle="tooltip" data-placement="right" title="Ver Area">
                                    <i class="col-sm-3 fa fa-eye fa-2x" ></i>
                         </a>
                        <a href='{{ route('editarArea',$area->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                            <i class="col-sm-3 fa fa-pencil-square-o fa-2x" ></i>
                         </a>
                        <a href='{{ route('eliminarArea',$area->id)}}' onclick="return confirm('¿Esta seguro de eliminar esta Area?')" 
                        data-toggle="tooltip" data-placement="right" title="eliminar" >
                              <i class="col-sm-3 fa fa-minus-square fa-2x" ></i>
                        </a>
                    <a href='{{ route('subareas',$area)}}' data-toggle="tooltip" data-placement="right" title="Agregar Subarea">
                                <i class="col-sm-2 fa fa-plus fa-2x" aria-hidden="true"  ></i>
                        </a>
                    </div>
                </td>
            </tr>   
        @endforeach
      </tbody>
    </table>
    
     {!! $areas->render() !!}
     @else
        <li>No hay Areas registradas</li>
    @endif

</div>

</Form>
@endsection