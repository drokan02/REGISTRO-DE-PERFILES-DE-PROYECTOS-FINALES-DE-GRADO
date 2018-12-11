@extends('layouts.menu')
@section('titulo','Lista de Roles del Sistema')
@section('contenido')
   
<form method="GET" action="{{route('roles')}}" >
        <div class="container">
            <div class="form-group row">
                @if ($roles->isNotEmpty() or $buscar)
                    <div class="col-sm-4"></div>
                    <div class=" col-sm-4">
                        <input type="search" placeholder="&#xF002; Buscar" style="font-family:Time, FontAwesome" class="form-control buscar"
                               name="buscar" autofocus value="{{$buscar}}" autocomplete="off" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">
                    </div>
                    <div class="col-sm-0">
                        <button class=" btn btn-success pull-left"> Buscar</button>
                    </div>
                @endif
                <div class="col-sm-3">
                    <a href="{{route('crearRol')}}" class="btn btn-link pull-right" data-toggle="tooltip" data-placement="right" title="añadir"><i class="fa fa-plus fa-2x"></i></a>
                    <a href="{{route('usuarios')}}" class="btn btn-link pull-right" data-toggle="tooltip" data-placement="right" title="Usuarios"><i class="fa fa-users fa-2x"></i></a>
                </div>
            </div>
        </div>

       <div class="container col-sm-8 listaDatos table-responsive-md">
            @if($roles->isNotEmpty())
            <table class="table table-hover table-bordered-primary text-center">
                <thead class=" thead thead-primary">
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

        </div >
    </form>
@endsection