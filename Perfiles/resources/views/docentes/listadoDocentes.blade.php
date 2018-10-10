@extends('layouts.menu')
@section('titulo','LISTAR DOCENTES')
@section('contenido')


<Form method="GET" action="{{route('Docentes')}}" >
    @if($docentes->isNotEmpty()) <!--BUSCADOR -->
    <div class="centrar col-sm-10 ">
        
            <div class="row">
                <div class="col-sm-3"></div>
                
                <div class=" col-sm-4">       
                                <input type="search" placeholder="&#xF002; Buscar" style="font-family:Time, FontAwesome" class="form-control" 
                                name="buscar" autofocus value="{{$buscar}}" autocomplete="off" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">   
                </div>          
                <div class="col-4">
                                <button class=" btn btn-success pull-left"> Buscar</button>
                </div>
            </div>
             
    </div>
   <!--FIN BUSCADOR -->
   @include('complementos.error')
  <div  class="centrar table-responsive col-sm-10 ">
      <table class="tabla" id="listaDocente">
          <thead class ="columnas">
        <tr>
          <th style="width: 5%; text-align: center;">N°</th>
          <th style="width: 25%;">Nombre</th>
          <th style="width: 45%; ">ApellidoP</th>
          <th style="width: 15%;">ApellidoM</th>
          <th style="width: 15%;">Titulo</th>
          <th style="width: 15%;">CHoraria</th>
          <th style="width: 15%;">Area</th>
          <th style="width: 15%;">SubArea</th>
        </tr>
      </thead>
      <tbody>
           
        @foreach ($docentes as $docente)
            <tr>
               
                <td style="text-align: right;">{{$fila++}}</td>
                <td>{{$docente->profesional->pluck('nombre_prof')[0]}}</td>
                <td>{{$docente->profesional->pluck('ap_pa_prof')[0]}}</td>
                <td>{{$docente->profesional->pluck('ap_ma_prof')[0]}}</td>
                <td>{{$docente->profesional->pluck('titulo_id')[0]}}</td>
                <td>{{$docente->carga_horaria}}</td>
                <td>{{$docente->area}}</td>
                <td>{{$docente->SubArea}}</td>
               
                <td>
                    <div class="text-center">
                        <a href='{{ route('verDocente',$docente->id)}}' data-toggle="tooltip" data-placement="right" title="Ver Docente">
                                    <i class="col-sm-3 fa fa-eye fa-2x" ></i>
                         </a>
                        <a href='{{ route('editarDocente',$docente->id)}}' data-toggle="tooltip" data-placement="right" title="Editar">
                            <i class="col-sm-3 fa fa-pencil-square-o fa-2x" ></i>
                         </a>
                        <a href='{{ route('eliminarDocente',$docente->id)}}' onclick="return confirm('¿Esta seguro de eliminar esta Docente?')" 
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
     @else
        <li>No hay Docentes registradas</li>
    @endif

</div>

</Form>
@endsection