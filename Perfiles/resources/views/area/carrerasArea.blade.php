@extends('layouts.menu')
@section('titulo','CARRERAS DE LA AREA :'.$area->nombre)
@section('contenido')


  
<Form method="GET" action="{{route('carrerasArea',$area)}}" >
    <!--BUSCADOR -->
    <div class="container">
            <div class="container col-sm-7">
                 <div class="form-group row">
                     <label for="cargahoraria_id" class="col-sm-2 col-form-label">Carreras</label>
                     <div class="col-sm-8 " >
                             <select name="carrera_id" id="carrera_id" class="form-control" >
                                 <option disabled selected > seleccionar </option>
                                 @foreach ($carreras as $carrera)
                                 <option value="{{$carrera->id}}"> {{$carrera->nombre_carrera}} </option>   
                                 @endforeach
                             </select>
                     </div>
                     <div class="col-sm-0">
                        <button class=" btn btn-success pull-left carreraArea"> Agregar</button>
                     </div>
                 </div>
            </div>
    </div>
   <!--FIN BUSCADOR -->


  <div  class=" tabla centrar col-sm-6 listaDatos">|
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
                        <a href='{{ route('eliminarCarreraArea',['carrera'=>$carrera,'area'=>$area])}}' class="dropdown-item eliminarCarreraArea" href="#">
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

</div>

</Form>
@endsection