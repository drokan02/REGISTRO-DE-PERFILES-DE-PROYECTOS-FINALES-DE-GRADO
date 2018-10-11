@extends('layouts.menu')
@section('titulo','LISTA DE DOCENTES')
@section('contenido')


<Form method="GET" action="{{route('listarProfesionales')}}" >
    @if ($docentes->isNotEmpty() or $buscar)
        <div class="centrar col-sm-8">
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
    @endif
    <!--BUSCADOR -->
    
   @if($docentes->isNotEmpty())
   @include('complementos.error')
   <div  class="centrar table-responsive col-sm-12 ">
      <table class="table table-hover text-center" id="listaProfesionales">
          <thead class ="columnas">
        <tr>
          <th style="width: 3%; text-align: center;">N°</th>
          <th style="width: 10%;">Nombres</th>
          <th style="width: 10%;">Apellidos</th>
          <th style="width: 8%; ">Titulo</th>
          <th style="width: 6%;">Telefono</th>
          <th style="width: 10%;">Correo</th>
          <th style="width: 10%;">Area</th>
          <th style="width: 10%;">Sub Area</th>
          <th style="width: 10%;">Carga horaria</th>
          <th style="width: 5%;">Opsiones</th>
        </tr>
      </thead>
      <tbody>
           
        @foreach ($docentes as $docente)
            <tr>  
                
                    <td style="text-align: right;">{{$fila++}}</td>
                    <td>{{$docente->profesional->nombre_prof}}</td>
                    <td>{{$docente->profesional->ap_pa_prof}}&nbsp;{{$docente->profesional->ap_ma_prof}}</td>
                    <td>{{$docente->profesional->titulo->pluck('nombre')[0]}}</td>
                    <td>{{$docente->profesional->telef_prof}}</td>
                    <td>{{$docente->profesional->correo_prof}}</td>
                    @if (!$docente->profesional->areas->pluck('id_area')[0])
                        <td>{{$docente->profesional->areas->pluck('nombre')[0]}}</td>
                        <td>{{$docente->profesional->areas->pluck('nombre')[1]}}</td>   
                    @else
                        <td>{{$docente->profesional->areas->pluck('nombre')[1]}}</td>
                        <td>{{$docente->profesional->areas->pluck('nombre')[0]}}</td>
                    @endif
                    <td>{{$docente->carga_horaria}}</td>
                
                <td style="width: 5%;"  class="dropdown dropleft text-center">
                    <a href="#" data-toggle="dropdown"  data-placement="right" title="opsiones">
                        <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
                    </a>
                    <ul id="contextMenu" class="dropdown-menu text-center" role="menu">    
                        <li >
                                
                            <a href='{{ route('editarDocente',$docente)}}' tabindex="-1"  class="payLink">
                                    <i class="fa fa-pencil-square-o fa-2x " style="color: #3390FF" ></i>
                                    <span class="hidden-xs">&nbsp;&nbsp; Editar</span>
                            </a>
                        </li>
                        <li >
                            <a href='{{ route('eliminarDocente',$docente)}}' onclick="return confirm('¿Esta seguro de eliminar el Profesional?')" tabindex="-1"  class="payLink">
                                    <i class="fa fa-minus-square fa-2x" style="color: #3390FF"></i>
                                    <span class="hidden-xs">Eliminar</span>
                            </a>
                        </li>
                    </ul>

                </td>
            </tr>   
        @endforeach
      </tbody>
    </table>
    
     {!! $docentes->render() !!}
     @else
        <li>No se encontro un Profesional con esa descripcion</li>
    @endif
    
</div>

</Form>
@endsection