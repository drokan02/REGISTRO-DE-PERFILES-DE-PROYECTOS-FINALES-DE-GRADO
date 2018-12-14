@if($docentes->isNotEmpty())
      <table class="table table-hover " id="listaProfesionales">
          <thead class ="thead text-center">
        <tr class="tr">
          <th style="width: 3%; text-align: center;">N°</th>
          <th style="width: 10%;">Nombres</th>
          <th style="width: 10%;">Apellidos</th>
          <th style="width: 8%; ">Titulo</th>
          <th style="width: 6%;">Telefono</th>
          <th style="width: 10%;">Correo</th>
          <th style="width: 10%;">Area</th>
          <th style="width: 10%;">Sub Area</th>
          <th style="width: 10%;">Carga horaria</th>
          <th style="width: 5%;">Acciones</th>
        </tr>
      </thead>
      <tbody class="tbody">
           
        @foreach ($docentes as $docente)
            <tr class="tr">  
                
                    <td style="text-align: right;">{{$fila++}}</td>
                    <td>{{$docente->profesional->nombre_prof}}</td>
                    <td>{{$docente->profesional->ap_pa_prof}}&nbsp;{{$docente->profesional->ap_ma_prof}}</td>
                    <td>{{$docente->profesional->titulo->abreviatura}}</td>
                    <td>{{$docente->profesional->telef_prof}}</td>
                    <td>{{$docente->profesional->correo_prof}}</td>
                    @foreach ($docente->profesional->areas as $area)
                            <td style="width: 10%;">{{$area->nombre}}</td>
                            @if ($docente->profesional->areas->count() < 2)
                            <td></td>
                            @endif
                    @endforeach
                    <td>{{$docente->cargahoraria->pluck('carga_horaria')[0]}}</td>      
                    <td>
                        <div class=" dropleft text-center">
                                <a href="#" data-toggle="dropdown"  data-placement="right" title="opciones">
                                        <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <a href='#' class="dropdown-item" href="#">
                                                <h5><i class="col-sm-3 fa fa-eye iconMenu" >&nbsp;&nbsp;&nbsp;Ver </i></h5>
                                        </a>
                                        <a href='{{ route('editarDocente',$docente)}}' class="dropdown-item" href="#">
                                                <h5><i class="col-sm-3 fa fa-pencil-square-o iconMenu">&nbsp;&nbsp;&nbsp;Editar</i></h5>
                                        </a>
                                        <a href='{{ route('eliminarDocente',$docente)}}' class="dropdown-item eliminar" href="#">
                                                <h5> <i class="col-sm-3 fa fa-minus-square iconMenu" >&nbsp;&nbsp;&nbsp;Eliminar</i></h5>
                                        </a>                                                      
                                </div>
                        </div> 
                    </td>
            </tr>   
        @endforeach
      </tbody>
    </table>
    
     {!! $docentes->render() !!}
     @else
        <li>No hay registros de Docentes</li>
    @endif
    <script src={{asset('js/eliminar.js')}}></script>