@extends('layouts.menu')
@section('titulo','LISTAR MODADELIDAD')
@section('contenido')

<Form method="GET" action="{{route('modalidad')}}">

    <!--BUSCADOR -->
   
   <!--FIN BUSCADOR 
   @include('complementos.error')-->
 
   @if($modalidades->isNotEmpty())
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
           
        @foreach ($modalidades as $modalidad)
            <tr>
                
                <td style="text-align: right;">{{$modalidad->id}}</td>
                <td>{{$modalidad->codigo_mod}}</td>
                <td>{{$modalidad->nombre_mod}}</td>
                <td style="width: 45%;" >{{$modalidad->descripsion_mod}}</td>
                <td>
                    <div class="text-center">
                        <a href='{{ route('ver',$modalidad->id)}}' data-toggle="tooltip" data-placement="right" title="Ver">
                                    <i class="col-sm-3 fa fa-eye fa-2x" ></i>
                         </a>
                        <a href='{{ route('editar',$modalidad->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                            <i class="col-sm-3 fa fa-pencil-square-o fa-2x" ></i>
                         </a>
                        <a href='{{ route('eliminar',$modalidad->id)}}' onclick="return confirm('¿Esta seguro de eliminar esta Modalidad?')" 
                        data-toggle="tooltip" data-placement="right" title="eliminar" >
                              <i class="col-sm-3 fa fa-minus-square fa-2x" ></i>
                        </a>
                        
                    </div>
                </td>
            </tr>   
        @endforeach
      </tbody>
    </table>
    @else
        <li>No hay Modalidades</li>
    @endif
</div>

</Form>

@endsection