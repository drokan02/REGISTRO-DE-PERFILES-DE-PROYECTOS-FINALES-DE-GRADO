@extends('layouts.menu')
@section('titulo','LISTAR DOCENTES')
@section('contenido')

<Form method="GET" action="{{route('Docentes')}}">
    <!--BUSCADOR -->
   @include('complementos.busqueda')
   <!--FIN BUSCADOR -->
   @include('complementos.error')
  <div class="table-responsive">
      <table class="tabla" id="listaDocente">
          <thead class ="columnas">
        <tr>
          <th style="width: 15%; text-align: center;">Nombre</th>
          <th style="width: 10%;">Apellidos</th>
          <th style="width: 25%;">CI</th>
          <th style="width: 25%; ">Correo</th>
          <th style="width: 15%;"></th>
        </tr>
      </thead>
      <tbody>
           
        @foreach ($docentes as $docente)
            <tr>
                
                <td style="text-align: right;">{{$fila++}}</td>
                <td>{{$docente->nombre}}</td>
                <td>{{$docente->apellido}}</td>
                <td style="width: 45%;" >{{$docente->area}}</td>
                <td>
                    <div class="text-center">
                        <a href='#',$docente->id)}}' data-toggle="tooltip" data-placement="right" title="Ver Docente">
                                    <i class="col-sm-3 fa fa-eye fa-2x" ></i>
                         </a>
                        <a href="#",$docente->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                            <i class="col-sm-3 fa fa-pencil-square-o fa-2x" ></i>
                         </a>
                        <a href='#',$docente->id)}}' onclick="return confirm('¿Esta seguro de eliminar esta Docente?')" 
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
@extends('layouts.menu')
@section('titulo','LISTAR DOCENTES')
@section('contenido')

<Form method="GET" action="{{route('Docentes')}}">
    <!--BUSCADOR -->
   @include('complementos.busqueda')
   <!--FIN BUSCADOR -->
   @include('complementos.error')
  <div class="table-responsive">
      <table class="tabla" id="listaDocente">
          <thead class ="columnas">
        <tr>
          <th style="width: 15%; text-align: center;">Nombre</th>
          <th style="width: 10%;">Apellidos</th>
          <th style="width: 25%;">CI</th>
          <th style="width: 25%; ">Correo</th>
          <th style="width: 15%;"></th>
        </tr>
      </thead>
      <tbody>
           
        @foreach ($docentes as $docente)
            <tr>
                
                <td style="text-align: right;">{{$fila++}}</td>
                <td>{{$docente->nombre}}</td>
                <td>{{$docente->apellido}}</td>
                <td style="width: 45%;" >{{$docente->area}}</td>
                <td>
                    <div class="text-center">                        <a href='#',$docente->id)}}' data-toggle="tooltip" data-placement="right" title="Ver Docente">
                                    <i class="col-sm-3 fa fa-eye fa-2x" ></i>
                         </a>
                        <a href="#",$docente->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                            <i class="col-sm-3 fa fa-pencil-square-o fa-2x" ></i>
                         </a>
                        <a href='#',$docente->id)}}' onclick="return confirm('¿Esta seguro de eliminar esta Docente?')" 
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
1