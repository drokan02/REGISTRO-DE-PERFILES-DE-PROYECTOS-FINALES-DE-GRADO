@extends('layouts.menu')
@section('titulo','LISTA DE PROFESIONALES')
@section('contenido')
<div class="">
    
    <Form method="GET" action="{{route('listarProfesionales')}}" >
         <!--BUSCADOR -->
         @if($profesionales->isNotEmpty() or $buscar)
        <div class="container">
             <div class="col-sm-12 ">
                <div class="form-group row">
                    <div class="col-sm-3"></div>
                    
                    <div class=" col-sm-4">       
                                    <input id="buscarProf" type="search" placeholder="&#xF002; Buscar" style="font-family:Time, FontAwesome" class="form-control buscar" 
                                    name="buscar" autofocus value="{{$buscar}}" autocomplete="off" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">   
                    </div>          
                    <div class="col-4">
                                    <button class=" btn btn-success pull-left"> Buscar</button>
                    </div>
                </div>
                 
            </div>
        </div>
        
        @endif
        
       <!--FIN BUSCADOR -->
      
       @include('complementos.error')
       <div  class="centrar table-responsive col-sm-11 listaDatos">
          @if($profesionales->isNotEmpty())
          <table class="table table-hover text-center" id="listaProfesionales">
              <thead class ="thead">
            <tr class="tr">
              <th style="width: 5%; text-align: center;">N°</th>
              <th style="width: 10%;">Nombres</th>
              <th style="width: 15%;">Apellidos</th>
              <th style="width: 8%; ">Titulo</th>
              <th style="width: 8%;">Telefono</th>
              <th style="width: 12%;">Correo</th>
              <th style="width: 10%;">Area</th>
              <th style="width: 10%;">Sub Area</th>
              <th style="width: 5%;">Acciones</th>
            </tr>
          </thead>
          <tbody class="tbody">
               
            @foreach ($profesionales as $profesional)
                <tr class="tr">  
                    <td style="text-align: right;">{{$fila++}}</td>
                    <td>{{$profesional->nombre_prof}}</td>
                    <td style="width: 15%;">{{$profesional->ap_pa_prof}}&nbsp;&nbsp;{{$profesional->ap_ma_prof}}</td>
                    <td style="width: 8%;">{{$profesional->titulo->pluck('nombre')[0]}}</td>
                    <td style="width: 8%;">{{$profesional->telef_prof}}</td>
                    <td style="width: 12%;">{{$profesional->correo_prof}}</td>
                    @if (!$profesional->areas->pluck('id_area')[0])
                        <td style="width: 10%;">{{$profesional->areas->pluck('nombre')[0]}}</td>
                        <td style="width: 10%;">{{$profesional->areas->pluck('nombre')[1]}}</td>    
                    @else
                        <td style="width: 10%;">{{$profesional->areas->pluck('nombre')[1]}}</td>
                        <td style="width: 10%;">{{$profesional->areas->pluck('nombre')[0]}}</td>
                    @endif
                    
                    <td>
                        <div class=" dropleft text-center">
                                <a href="#" data-toggle="dropdown"  data-placement="right" title="opsiones">
                                        <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <a href='#' class="dropdown-item" href="#">
                                                <h5><i class="col-sm-3 fa fa-eye iconMenu" >&nbsp;&nbsp;&nbsp;Ver </i></h5>
                                        </a>
                                        <a href='{{ route('editarProfesional',$profesional->id)}}' class="dropdown-item" href="#">
                                                <h5><i class="col-sm-3 fa fa-pencil-square-o iconMenu">&nbsp;&nbsp;&nbsp;Editar</i></h5>
                                        </a>
                                        <a href='{{ route('eliminarProfesional',$profesional)}}' class="dropdown-item eliminar" href="#">
                                                <h5> <i class="col-sm-3 fa fa-minus-square iconMenu" >&nbsp;&nbsp;&nbsp;Eliminar</i></h5>
                                        </a>                                                      
                                </div>
                        </div> 
                    </td>
                </tr>   
            @endforeach
          </tbody>
        </table>
        
         {!! $profesionales->render() !!}
         @else
            <br>
            <li>No se encontro Profesionales registrados</li>
        @endif
        
    </div>
    </Form>
</div>
@endsection