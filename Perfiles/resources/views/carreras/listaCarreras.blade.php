@extends('layouts.menu')
@section('titulo','LISTA DE CARRERAS')
@section('contenido')
    <div class="row mb-3">
        <div class="col-8 offset-1">
            <form method="GET" action="{{route('carreras')}}" class="form-inline">
                <input class="form-control" name="name" placeholder="Buscar">
                <button type="submit" class=" btn btn-success">Buscar</button>
            </form>
        </div>
        <div class="col ">
            <a href="{{route('crearCarrera')}}" class="btn btn-link" data-toggle="tooltip" data-placement="right" title="añadir"><i class="fa fa-plus fa-2x"></i></a>
        </div>
    </div>
    <div class="alert-danger">
        @foreach($errors->all() as $errors)
            <ul>
                <li>{{$errors}}</li>
            </ul>
        @endforeach
    </div>
    @if($carreras->isNotEmpty())
        <table class="table table-hover table-bordered-primary text-center">
            <thead class="thead-primary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Codigo Carrera</th>
                <th scope="col">Carrera</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($carreras as $carrera)
                <tr>
                    <th scope="row">{{$carrera->id}}</th>
                    <td>{{$carrera->codigo_carrera}}</td>
                    <td>{{$carrera->nombre_carrera}}</td>
                    <td>
                        <form method="POST" action="{{route('eliminarCarrera',$carrera)}}">
                            {{method_field('DELETE')}}
                            {!! csrf_field() !!}
                            <a href="{{route('editarCarrera',$carrera)}}" class="btn btn-link" data-toggle="tooltip" data-placement="right" title="Editar"><i class="fa fa-edit fa-2x"></i></a>
                            <button class="btn btn-link" type="submit"><i class="fa fa-trash fa-2x"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <li>No hay Carreras</li>
    @endif
@endsection