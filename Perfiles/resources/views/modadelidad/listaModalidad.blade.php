@extends('layouts.menu')
@section('titulo','LISTAR MODADELIDAD')
@section('contenido')

<Form method="GET" action="{{route('modañ')}}">
    <!--BUSCADOR -->
   @include('complementos.busqueda')
   <!--FIN BUSCADOR -->
   @include('complementos.error')
  <div class="table-responsive">
      <table class="tabla" id="listaModall">
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
           
        @foreach ($modadelidad)
            <tr>
                
                <td style="text-align: right;">{{$fila++}}</td>
                <td>{{$modadelidad->codigo}}</td>
                <td>{{$modadelidad->nombre}}</td>
                <td style="width: 45%;" >{{$modadelidad->descripcion}}</td>
                <td>
                    <div class="text-center">
                        <a href='{{ route('verModalidad',$modadelidad->id)}}' data-toggle="tooltip" data-placement="right" title="Ver Modalidad">
                                    <i class="col-sm-3 fa fa-eye fa-2x" ></i>
                         </a>
                        <a href='{{ route('editarModalidad',$modadelidad->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                            <i class="col-sm-3 fa fa-pencil-square-o fa-2x" ></i>
                         </a>
                        <a href='{{ route('eliminarModalidad',$modadelidad->id)}}' onclick="return confirm('¿Esta seguro de eliminar esta Modalidad?')" 
                        data-toggle="tooltip" data-placement="right" title="eliminar" >
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