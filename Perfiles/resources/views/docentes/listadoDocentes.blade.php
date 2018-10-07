@extends('layouts.menu')
@section('titulo','LISTAR DOCENTES')
@section('contenido')

<Form method="GET" action="{{route('Docentes')}}">
    <!--BUSCADOR -->
  
   <!--FIN BUSCADOR -->
   @include('complementos.error')
  <div class="table-responsive">
      <table class="tabla" id="listaDocente">
          <thead class ="columnas">
        <tr>
          <th style="width: 5%; text-align: center;">N°</th>
          <th style="width: 10%;">codigo</th>
          <th style="width: 25%;">profesion</th>
          <th style="width: 45%; ">CargaHoraria</th>
          <th style="width: 15%;"></th>
        </tr>
      </thead>
      <tbody>
           
        @foreach ($docentes as $docente)
            <tr>
                
                <td style="text-align: right;">{{$fila++}}</td>
                <td>{{$docente->codigo_sis}}</td>
                <td>{{$docente->carga_horaria}}</td>
                <td style="width: 45%;" >{{$docente->profesion_id}}</td>
                <td>
                    <div class="text-center">
                        <a href='{{ route('verDocente',$docente->id)}}' data-toggle="tooltip" data-placement="right" title="Ver Docente">
                                    <i class="col-sm-3 fa fa-eye fa-2x" ></i>
                         </a>
                        <a href='{{ route('editarDocente',$docente->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                            <i class="col-sm-3 fa fa-pencil-square-o fa-2x" ></i>
                         </a>
                        <a href='{{ route('eliminarDocente',$docente->id)}}' onclick="return confirm('¿Esta seguro de eliminar esta Area?')" 
                        data-toggle="tooltip" data-placement="right" title="eliminar" >
                              <i class="col-sm-3 fa fa-minus-square fa-2x" ></i>
                        </a>
                   
                    </div>
                </td>
            </tr>   
        @endforeach
      </tbody>
    </table>
    
     {!! $docentes->render() !!}

</div>

</Form>
@endsection