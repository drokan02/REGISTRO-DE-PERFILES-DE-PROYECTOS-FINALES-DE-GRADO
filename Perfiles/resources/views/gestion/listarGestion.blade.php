@extends('layouts.menu')
@section('titulo','LISTA GESTIONES')
@section('contenido')


  
<Form method="GET" action="{{route('gestiones')}}" >
    <!--BUSCADOR -->

        
    <div class="container">
        <div class="form-group row">
            
            <div class="col-sm-10">
                        <a href='{{route('registrarGestion')}}' >
                                        <!--class=pull-right  para poner el boton al extremo derecho-->
                                        <i class=" fa fa-plus fa-2x fa-3x pull-right" data-toggle="tooltip" data-placement="right" title="Agregar nueva Gestion" ></i>                 
                         </a> 
            </div>
        </div>
             
</div> 
   <!--FIN BUSCADOR -->


  <div  class="centrar col-sm-10 listaDatos">
   @if($gestiones->isNotEmpty())

      <table class=" table table-hover table-bordered-primary text-center" id="listaArea">
        <thead class ="thead">
        <tr class="tr">
          <th style="width: 5%; text-align: center;">N°</th>
          <th style="width: 10%;">Fecha Inicio</th>
          <th style="width: 25%;">Fecha Fin</th>
          <th style="width: 45%; ">Gestion</th>
          <th style="width: 10%;">Opciones</th>
        </tr>
      </thead>
      <tbody class="tbody">
           
        @foreach ($gestiones as $gestion)
            <tr class="tr">
                <td style="text-align: right;">{{$fila++}}</td>
                <td>{{$gestion->fecha_ini}}</td>
                <td>{{$gestion->fecha_fin}}</td>
                <td>{{$gestion->periodo}}</td>

                <td>
                    <div class="text-center">
                        <a href='{{ route('editarGestion',$gestion)}}' class="dropdown-item" href="#">
                                <h5><i class="col-sm-3 fa fa-pencil-square-o fa-2x iconMenu"></i></h5>
                        </a>  
                    </div> 
                </td>
            </tr>   
        @endforeach
      </tbody>
    </table>
    
     {!! $gestiones->render() !!}
     @else
        <li>No hay Gestiones registradas</li>
    @endif

</div>

</Form>
@endsection