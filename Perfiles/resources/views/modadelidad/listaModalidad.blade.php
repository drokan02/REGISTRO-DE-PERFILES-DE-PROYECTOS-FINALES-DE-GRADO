@extends('layouts.menu')
@section('titulo','LISTAR MODADELIDAD')
@section('contenido')

<Form method="GET" action="{{route('modalidad')}}">

    <!--BUSCADOR -->
   
   <!--FIN BUSCADOR 
   @include('complementos.error')-->
 
   @if($modalidades->isNotEmpty())
  <div class="container col-sm-8">
      <div class="table-responsive">
          <table class="tabla" id="listaModall">
              <thead class ="columnas">
            <tr>
              <th style="width: 5%; text-align: center;">N°</th>
              <th style="width: 10%;">Codigo</th>
              <th style="width: 25%;">Nombre</th>
              <th style="width: 43%; ">Descripcion</th>
              <th style="width: 17%;"></th>
            </tr>
          </thead>
          <tbody>
               
            @foreach ($modalidades as $modalidad)
                <tr>
                    
                    <td style="text-align: right;">{{$modalidad->id}}</td>
                    <td>{{$modalidad->codigo_mod}}</td>
                    <td>{{$modalidad->nombre_mod}}</td>
                    <td style="width: 43%;" >{{$modalidad->descripsion_mod}}</td>
                    <td>
                        <form method="POST" action="{{route('eliminarModalidad',$modalidad)}}">
                            {{method_field('DELETE')}}
                                {!! csrf_field() !!}
                            <div class="text-center">
                                <a href='{{ route('ver',$modalidad->id)}}' class="btn btn-link" data-toggle="tooltip" data-placement="right" title="Ver">
                                            <i class="fa fa-eye fa-2x" ></i>
                                 </a>
                                <a href='{{ route('editarModalidad',$modalidad)}}' class="btn btn-link" data-toggle="tooltip" data-placement="right" title="Editar">
                                    <i class="fa fa-pencil-square-o fa-2x" ></i>
                                 </a>
                                <button type="submit" class="btn btn-link" onclick="return confirm('¿Esta seguro de eliminar esta Modalidad?')"
                                data-toggle="tooltip" data-placement="right" title="eliminar" >
                                      <i class=" fa fa-minus-square fa-2x" ></i>
                                </button>
      
                            </div>
                        </form>
                    </td>
                </tr>   
            @endforeach
          </tbody>
        </table>
        @else
            <li>No hay Modalidades</li>
        @endif
      </div>
  </ class="container col-sm-8">

</Form>

@endsection