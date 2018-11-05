@if($carrera->areas->isNotEmpty())

      <table class=" table  table-hover text-center" id="listaArea">
        <thead class="thead">
        <tr class="tr">
          <th style="width: 5%; text-align: center;">N°</th>
          <th style="width: 40%;">Carrera</th>
          <th style="width: 10%;">Opciones</th>
        </tr>
      </thead>
      <tbody class="tbody">
           
        @foreach ($carrera->areas as $area)
            @if (!$area->area_id)
                <tr class="tr">
                    <td style="text-align: right;">{{$fila++}}</td>
                    <td>{{$area->nombre}}</td>
                    <td>
                            <form method="POST" action="{{ route('eliminarCarreraArea',['carrera'=>$carrera,'area'=>$area])}}">
                                    {{method_field('DELETE')}}
                                    {!! csrf_field() !!}
                                    <button class="dropdown-item"  type="submit" id="eliminarAreaCarrera">
                                        <i class="fa fa-minus-square iconMenu fa-2x" ></i>
                                    </button>
                            </form> 
                          
                    </td>
                </tr>
            @endif  
        @endforeach
      </tbody>
    </table>
     @else
        <li>No hay Carreras registradas</li>
    @endif
    <script src={{asset('js/eliminar.js')}}></script>