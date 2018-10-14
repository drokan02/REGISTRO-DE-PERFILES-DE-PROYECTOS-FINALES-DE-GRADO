@if($subareas->isNotEmpty())   <!--BUSCADOR -->
      <table class="tabla" id="listaArea">
          <thead class ="columnas">
        <tr>
          <th style="width: 5%; text-align: center;">N°</th>
          <th style="width: 10%;">Codigo</th>
          <th style="width: 25%;">Nombre</th>
          <th style="width: 45%;">Descripcion</th>
          <th style="width: 10%;">Opciones</th>
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
                    <div class=" dropleft text-center">
                            <a href="#" data-toggle="dropdown"  data-placement="right" title="opsiones">
                                    <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a href='{{route('editarSubarea',$subarea->id)}}' class="dropdown-item" href="#">
                                            <h5><i class="col-sm-3 fa fa-pencil-square-o iconMenu">&nbsp;&nbsp;&nbsp;Editar</i></h5>
                                    </a>
                                    <a href='{{ route('eliminarSubarea',$subarea->id)}}' class="dropdown-item eliminar" href="#">
                                            <h5> <i class="col-sm-3 fa fa-minus-square iconMenu" >&nbsp;&nbsp;&nbsp;Eliminar</i></h5>
                                    </a>                                                        
                            </div>
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