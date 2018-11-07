@if ($perfiles->isNotEmpty())
<table class=" table  table-hover " id="listaArea">
    <thead class="thead text-center">
    <tr class="tr">
        <th style="width: 3%; text-align: center;">N°</th>
        <th style="width: 20%;">Titulo</th>
        <th style="width: 30%;">Descripcion</th>
        <th style="width: 10%; ">Autores</th>
        <th style="width: 10%; ">Tutor</th>
        <th style="width: 5%;">Opciones</th>
    </tr>
    </thead>
    <tbody class="tbody">

        @foreach ($perfiles as $perfil)
            <tr class="tr">
                <td style="text-align: center;">{{$fila++}}</td>
                <td>{{$perfil->titulo}}</td>
                <td class="descripcion" style="width: 30%;">{{$perfil->descripcion}}</td>
                <td>{{$perfil->estudiantes->pluck('nombres')->implode(' - ')}}</td>
                <td>
                    {{$perfil->tutor[0]->ap_pa_prof}}
                    {{$perfil->tutor[0]->ap_ma_prof}}
                    {{$perfil->tutor[0]->nombre_prof}}
                </td>
                <td>
                    <div class=" dropleft text-center">
                            <a href="#" data-toggle="dropdown"  data-placement="right" title="opsiones">
                                    <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a href='{{ route('verPerfil',$perfil)}}' class="dropdown-item" href="#">
                                            <h5><i class="col-sm-3 fa fa-eye iconMenu" >&nbsp;&nbsp;&nbsp;Ver </i></h5>
                                    </a>
                                    <a href='{{ route('editarPerfil',$perfil)}}' class="dropdown-item" href="#">
                                            <h5><i class="col-sm-3 fa fa-pencil-square-o iconMenu">&nbsp;&nbsp;&nbsp;Editar</i></h5>
                                    </a>
                                    <a href='{{ route('eliminarPerfil',$perfil)}}' class="dropdown-item eliminar" href="#">
                                            <h5> <i class="col-sm-3 fa fa-minus-square iconMenu" >&nbsp;&nbsp;&nbsp;Eliminar</i></h5>
                                    </a>                                                    
                            </div>
                    </div> 
                </td>
            </tr>   
        @endforeach
        </tbody>
</table>
{!! $perfiles->render() !!}
@else
    <li>No se encontro Perfiles registrados</li>
@endif
<script src={{asset('js/eliminar.js')}}></script>