@extends('layouts.menu')
@section('titulo','LISTA DE USUARIOS DEL SISTEMA')
@section('contenido')
<form method="GET" action="{{route('usuarios')}}" >
    
        @if ($users->isNotEmpty() or $buscar)

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
                    <div class="col-sm-3">
                            <a href="{{route('crearUsuario')}}" class="btn btn-link pull-right" data-toggle="tooltip" data-placement="right" title="Añadir"><i class="fa fa-user-plus fa-2x"></i></a>
                            <a href="{{route('roles')}}" class="btn btn-link btn-lg pull-right">Roles</a>
                    </div>
                </div>
                     
            </div> 

        @endif
   

<div class="container col-sm-8 listaDatos">
        @if($users->isNotEmpty())
    <table class="table table-hover table-bordered-primary text-center">
        <thead class="thead-primary">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Rol Usuario</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $us)
            <tr>
                <th scope="row">{{$us->id}}</th>
                <td>{{$us->name}}</td>
                <td>{{$us->roles->pluck('nombre_rol')->implode(' - ')}}</td>
                <td>
                    <div class=" dropleft text-center">
                            <a href="#" data-toggle="dropdown"  data-placement="right" title="opsiones">
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
</div>
</form>
@endsection
