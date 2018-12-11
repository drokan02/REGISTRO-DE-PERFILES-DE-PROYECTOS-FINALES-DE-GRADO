@if($users->isNotEmpty())
<table class="table  table-hover text-center">
    <thead class="thead">
    <tr class="tr">
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Rol Usuario</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody class="tbody">
    @foreach($users as $us)
        <tr class="tr">
            <th scope="row">{{$us->id}}</th>
            <td>{{$us->name}}</td>
            <td>{{$us->roles->pluck('nombre_rol')->implode(' - ')}}</td>
            <td>
                <div class=" dropleft text-center">
                        <a href="#" data-toggle="dropdown"  data-placement="right" title="opciones">
                                <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                <a href="{{route('detalleUsuario',['id'=>$us->id])}}" class="dropdown-item" href="#">
                                        <h5><i class="col-sm-3 fa fa-eye iconMenu" >&nbsp;&nbsp;&nbsp;Datos Usuario </i></h5>
                                </a>
                                <a href="{{route('editarUsuario',$us)}}" class="dropdown-item" href="#">
                                        <h5><i class="col-sm-3 fa fa-pencil-square-o iconMenu">&nbsp;&nbsp;&nbsp;Editar</i></h5>
                                </a>
                                <a href='{{route('eliminarUsuario',$us)}}' class="dropdown-item eliminar" href="#">
                                        <h5> <i class="col-sm-3 fa fa-minus-square iconMenu" >&nbsp;&nbsp;&nbsp;Eliminar</i></h5>
                                </a>                                                     
                        </div>
                </div> 
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
    <li>No hay usuarios</li>
@endif
<script src={{asset('js/eliminar.js')}}></script>
