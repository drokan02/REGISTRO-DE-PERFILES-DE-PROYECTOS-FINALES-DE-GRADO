@extends('layouts.menu')
@section('titulo','LISTA DE TUTOR')
@section('contenido')
    <div class="row mb-3">
        <div class="col-8 offset-1">

        </div>
    </div>
    @if($profesionales->isNotEmpty())
        <table class="table table-hover table-bordered-primary text-center">
            <thead class="thead-primary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">ci</th>
                <th scope="col">Telefono</th>
                <th scope="col">Direccion</th>
                <th scope="col">Perfil</th>
                <th scope="col">Codigosis</th>
                <th scope="col">Titulo</th>
                <th scope="col">Email</th>
                
            </tr>
            </thead>
            <tbody>
           <!-- @foreach($users as $us)
                <tr>
                    <th scope="row">{{$us->id}}</th>
                    <td>{{$us->name}}</td>
                    <td>{{$us->roles->pluck('nombre')->implode(' - ')}}</td>
                    <td>
                        <form method="POST" action="{{route('eliminarTutor',$us)}}">
                            {{method_field('DELETE')}}
                            {!! csrf_field() !!}
                            <a href="{{route('detalleUsuario',['id'=>$us->id])}}" class="btn btn-link" data-toggle="tooltip" data-placement="right" title="Datos Usuario"><i class="fa fa-eye fa-2x"></i></a>
                            <a href="{{route('editarUsuario',$us)}}" class="btn btn-link" data-toggle="tooltip" data-placement="right" title="Editar"><i class="fa fa-edit fa-2x"></i></a>
                            <button class="btn btn-link" type="submit"><i class="fa fa-trash fa-2x"></i></button> 
                        </form>
                    </td>
                </tr>
            @endforeach-->
            </tbody>
        </table>
    @else
        <li>No hay Tutor</li>
    @endif
@endsection