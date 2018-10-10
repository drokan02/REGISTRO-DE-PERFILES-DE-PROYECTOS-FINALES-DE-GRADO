@extends('layouts.menu')
@section('titulo','LISTAR AREAS')
@section('contenido')

<Form method="GET" action="{{route('Areas')}}">
    <!--BUSCADOR -->
   @include('complementos.busqueda')
   <!--FIN BUSCADOR -->
   @include('complementos.error')
  <div class="table-responsive">
      <table class="tabla" id="listaArea">
          <thead class ="columnas">
        <tr>
          <th style="width: 5%; text-align: center;">N°</th>
          <th style="width: 10%;">Codigo sis</th>
          <th style="width: 25%;">carga horaria</th>
          <th style="width: 45%; ">Descripcion</th>
          <th style="width: 15%;"></th>
        </tr>
      </thead>
      <tbody>
           
        @foreach ($docentes as $docente)
            <tr>
                
                <td style="text-align: right;">{{$fila++}}</td>
                <td>{{$docente->codigo_sis}}</td>
                <td>{{$docente->carga_horaria}}</td>
                <td>{{$docente->}}</td>
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

</div>

</Form>
@endsection