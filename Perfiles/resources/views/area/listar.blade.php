@extends('layouts.menu')
@section('titulo','LISTAR AREAS')
@section('contenido')


  
<Form method="GET" action="{{route('Areas')}}" >
    <!--BUSCADOR -->
    @if ($areas->isNotEmpty() or $buscar)
        
    <div class="container">
                <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class=" col-4">       
                                    <input type="search" placeholder="&#xF002; Buscar" style="font-family:Time, FontAwesome" class="form-control buscar" 
                                    name="buscar" autofocus value="{{$buscar}}" autocomplete="off" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">   
                    </div>          
                    <div class="col-sm-0">
                                    <button class=" btn btn-success pull-left"> Buscar</button>
                    </div>
                   
                </div>
                     
        </div> 
    @endif
   <!--FIN BUSCADOR -->


  <div  class="centrar col-sm-10 listaDatos">
   @if($areas->isNotEmpty())

      <table class="table-hover table-bordered-primary text-center" id="listaArea">
        <thead class ="columnas">
        <tr>
          <th style="width: 5%; text-align: center;">N°</th>
          <th style="width: 10%;">Codigo</th>
          <th style="width: 25%;">Nombre</th>
          <th style="width: 45%; ">Descripcion</th>
          <th style="width: 10%;">Opciones</th>
        </tr>
      </thead>
      <tbody>
           
        @foreach ($areas as $area)
            <tr>
                <td style="text-align: right;">{{$fila++}}</td>
                <td>{{$area->codigo}}</td>
                <td>{{$area->nombre}}</td>
                <td class="descripcion" style="width: 45%;" >{{$area->descripcion}}</td>

                <td>
                    <div class=" dropleft text-center">
                            <a href="#" data-toggle="dropdown"  data-placement="right" title="opsiones">
                                    <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a href='{{ route('verArea',$area->id)}}' class="dropdown-item" href="#">
                                            <h5><i class="col-sm-3 fa fa-eye iconMenu" >&nbsp;&nbsp;&nbsp;Ver </i></h5>
                                    </a>
                                    <a href='{{ route('editarArea',$area->id)}}' class="dropdown-item" href="#">
                                            <h5><i class="col-sm-3 fa fa-pencil-square-o iconMenu">&nbsp;&nbsp;&nbsp;Editar</i></h5>
                                    </a>
                                    <a href='{{ route('eliminarArea',$area->id)}}' class="dropdown-item eliminar" href="#">
                                            <h5> <i class="col-sm-3 fa fa-minus-square iconMenu" >&nbsp;&nbsp;&nbsp;Eliminar</i></h5>
                                    </a>
                                    <a href='{{ route('subareas',$area)}}' class="dropdown-item" href="#">
                                            <h5><i class="col-sm-3 fa fa-plus iconMenu"  >&nbsp;&nbsp;&nbsp;Agregar subArea</i></h5>
                                    </a>                                                      
                            </div>
                    </div> 
                </td>
            </tr>   
        @endforeach
      </tbody>
    </table>
    
     {!! $areas->render() !!}
     @else
        <li>No hay Areas registradas</li>
    @endif

</div>

</Form>
@endsection