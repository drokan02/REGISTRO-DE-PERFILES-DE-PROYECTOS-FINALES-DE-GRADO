@if($area->carreras->isNotEmpty())
      <table class=" table table-hover table-bordered-primary text-center" id="listaArea">
        <thead class="thead">
        <tr class="tr">
          <th style="width: 5%; text-align: center;">N°</th>
          <th style="width: 40%;">Carrera</th>
          <th style="width: 10%;">Opciones</th>
        </tr>
      </thead>
      <tbody class="tbody">
           
        @foreach ($area->carreras as $carrera)
            <tr class="tr">
                <td style="text-align: right;">{{$fila++}}</td>
                <td>{{$carrera->nombre_carrera}}</td>
                <td>
                        <a href='{{ route('eliminarCarreraArea',$area->id)}}' class="dropdown-item eliminar" href="#">
                                <i class="col-sm-3 fa fa-minus-square iconMenu fa-2x" ></i>
                        </a>
                </td>
            </tr>   
        @endforeach
      </tbody>
    </table>
     @else
        <li>No hay Carreras registradas</li>
    @endif