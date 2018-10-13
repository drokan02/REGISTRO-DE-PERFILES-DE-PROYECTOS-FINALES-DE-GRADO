@extends('layouts.menu')
@section('titulo','LISTA DE ESTUDIANTES')
@section('contenido')

    @if($estudiantes->isNotEmpty())
        <div class="container col-sm-9">
            <table class="table table-hover table-bordered-primary text-center">
                <thead class="thead-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">carrera</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($estudiantes as $estudiante)
                    <tr>
                        <th scope="row">{{$estudiante->id}}</th>
                        <td>{{$estudiante->nombres}}</td>
                        <td>{{$estudiante->carrera()->pluck('nombre_carrera')->implode(' - ')}}</td>
                        <td>
                            <form method="POST" action="#">
                                {{method_field('DELETE')}}
                                {!! csrf_field() !!}
                                <a href="{{route('detalleEstudiante',$estudiante)}}" class="btn btn-link" data-toggle="tooltip" data-placement="right" title="Datos estudiante"><i class="fa fa-eye fa-2x"></i></a>
                                <a href="#" class="btn btn-link" data-toggle="tooltip" data-placement="right" title="Editar"><i class="fa fa-edit fa-2x"></i></a>
                                <button class="btn btn-link" type="submit"><i class="fa fa-trash fa-2x"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <li>No hay usuarios</li>
    @endif




@endsection