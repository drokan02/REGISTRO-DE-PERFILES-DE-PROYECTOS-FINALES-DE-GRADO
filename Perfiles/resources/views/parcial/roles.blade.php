@if($roles->isNotEmpty())
    <table class="table  table-hover text-center">
    <thead class="thead thead-primary">
    <tr class="tr">
        <th scope="col">#</th>
        <th scope="col">Nombre Rol</th>
        <th scope="col">privilegios</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody class="tbody">
    @foreach($roles as $rol)
        <tr class="tr">
            <th scope="row">{{$rol->id}}</th>
            <td>{{$rol->nombre_rol}}</td>
            <td>{{$rol->privilegios}}</td>
            <td>

                <div class=" dropleft text-center">
                        <a href="#" data-toggle="dropdown"  data-placement="right" title="opciones">
                                <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                <a href="{{route('editarRol',$rol)}}" class="dropdown-item" href="#">
                                        <h5><i class="col-sm-3 fa fa-pencil-square-o iconMenu">&nbsp;&nbsp;&nbsp;Editar</i></h5>
                                </a>
                                <a href="{{route('eliminarRol',$rol)}}" class="dropdown-item eliminar" href="#">
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
    <li>No hay Roles</li>
@endif
<script src={{asset('js/eliminar.js')}}></script>