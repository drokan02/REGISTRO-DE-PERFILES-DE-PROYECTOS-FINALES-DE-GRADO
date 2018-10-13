@if($profesionales->isNotEmpty())
<table class="table table-hover text-center" id="listaProfesionales">
    <thead class ="columnas">
    <tr>
        <th style="width: 5%; text-align: center;">N°</th>
        <th style="width: 10%;">Nombres</th>
        <th style="width: 15%;">Apellidos</th>
        <th style="width: 8%; ">Titulo</th>
        <th style="width: 8%;">Telefono</th>
        <th style="width: 12%;">Correo</th>
        <th style="width: 10%;">Area</th>
        <th style="width: 10%;">Sub Area</th>
        <th style="width: 5%;">Opsiones</th>
    </tr>
    </thead>
    <tbody id="datos">
        
    @foreach ($profesionales as $profesional)
        <tr>  
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
            
            <td style="width: 5%;"  class="dropdown dropleft text-center">
                <a href="#" data-toggle="dropdown"  data-placement="right" title="opsiones">
                    <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
                </a>
                <ul id="contextMenu" class="dropdown-menu text-center" role="menu">    
                    <li >
                            
                        <a href='{{ route('editarProfesional',$profesional->id)}}' tabindex="-1"  class="payLink">
                                <i class="fa fa-pencil-square-o fa-2x " style="color: #3390FF" ></i>
                                <span class="hidden-xs">&nbsp;&nbsp; Editar</span>
                        </a>
                    </li>
                    <li >
                        <a   href='{{ route('eliminarProfesional',$profesional)}}'  tabindex="-1"  class="eliminar">
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
    
     {!! $profesionales->render() !!}
     @else
        <br>
        <li>No se encontro un Profesional con esa descripcion</li>
    @endif
    