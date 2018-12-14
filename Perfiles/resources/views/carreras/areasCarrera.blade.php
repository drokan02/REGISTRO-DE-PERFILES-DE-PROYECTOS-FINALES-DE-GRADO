@extends('layouts.menu')
@section('titulo','Areas de la Carrera :'.$carrera->nombre_carrera)
@section('contenido')

<Form method="POS" action="{{route('almacenarAreasCarrera',$carrera)}}" >
    {!! csrf_field() !!}
    <div class="container">
            <div class="container col-sm-7">
                 <div class="form-group row">
                     <label for="cargahoraria_id" class="col-sm-2 col-form-label">Carreras</label>
                     <div class="col-sm-8 " >
                             <select name="area_id" class="form-control form-control-chosen " data-placeholder="Seleccione." >
                                 <option disabled selected > seleccionar </option>
                                 @foreach ($areas as $area)
                                 <option value="{{$area->id}}"> {{$area->nombre}} </option>   
                                 @endforeach
                                 
                             </select>
                     </div>
                     <div class="col-sm-0">
                        <button class=" btn btn-success pull-left" id="areaCarrera"> Agregar</button>
                     </div>
                 </div>
            </div>
    </div>
</Form>
  <div  class=" tabla centrar col-sm-6 listaDatos">
   @if($carrera->areas->isNotEmpty())

      <table class=" table table-hover table-bordered-primary text-center" id="listaArea">
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
        <li>La Carrera no tiene Areas registradas</li>
    @endif

</div>
<script>
        $('.form-control-chosen').chosen({});
 </script>
@endsection