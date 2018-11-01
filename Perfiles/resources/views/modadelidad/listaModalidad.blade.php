@extends('layouts.menu')
@section('titulo','LISTA MODADELIDADES')
@section('contenido')

<Form method="GET" action="{{route('modalidad')}}">

    <!--BUSCADOR -->
   
   <!--FIN BUSCADOR 
   @include('complementos.error')-->
  <div class="container col-sm-8 listaDatos">
        @if($modalidades->isNotEmpty())
          <table class="table tabla" id="listaModall">
              <thead class ="thead">
            <tr class="tr">
              <th style="width: 5%; text-align: center;">N°</th>
              <th style="width: 10%;">Codigo</th>
              <th style="width: 25%;">Nombre</th>
              <th style="width: 43%; ">Descripcion</th>
              <th style="width: 17%;">Acciones</th>
            </tr>
          </thead>
          <tbody class="tbody">
               
            @foreach ($modalidades as $modalidad)
                <tr class="tr">
                    
                    <td style="text-align: right;">{{$modalidad->id}}</td>
                    <td>{{$modalidad->codigo_mod}}</td>
                    <td>{{$modalidad->nombre_mod}}</td>
                    <td style="width: 43%;" >{{$modalidad->descripcion_mod}}</td>

                    <td>
                        <div class=" dropleft text-center">
                                <a href="#" data-toggle="dropdown"  data-placement="right" title="opsiones">
                                        <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <a href='{{ route('ver',$modalidad->id)}}' class="dropdown-item" >
                                                <h5><i class="col-sm-3 fa fa-eye iconMenu" >&nbsp;&nbsp;&nbsp;Ver </i></h5>
                                        </a>
                                        <a href='{{ route('editarModalidad',$modalidad)}}' class="dropdown-item" >
                                                <h5><i class="col-sm-3 fa fa-pencil-square-o iconMenu">&nbsp;&nbsp;&nbsp;Editar</i></h5>
                                        </a>
                                        <a href="{{route('eliminarModalidad',$modalidad)}}" class="dropdown-item eliminar" >
                                                <h5> <i class="col-sm-3 fa fa-minus-square iconMenu" >&nbsp;&nbsp;&nbsp;Eliminar</i></h5>
                                        </a>                                                      
                                </div>
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