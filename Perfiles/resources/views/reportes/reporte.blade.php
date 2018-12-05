@extends('layouts.menu')
@section('titulo','REPORTE')
@section('contenido')
    @if($perfiles->isNotEmpty())
        <div class="row">
            <form method="GET" action="{{route('reportePdf')}}">
                <label>
                    <input  name="perfiles" value="{{json_encode($perfiles)}}" hidden>
                </label>
                <button type="submit" class="btn btn-link mb-2"><i class="fa fa-file-pdf-o fa-2x" >Exportar PDF </i></button>
            </form>
        </div>
        <table class="table table-hover table-bordered-primary text-center table-responsive-md">
            <thead class="thead thead-primary">
            <tr class="tr">
                <th scope="col" width="7%">#</th>
                <th scope="col" width="21%">Estudiantes</th>
                <th scope="col" width="23%">Titulo</th>
                <th scope="col" width="12%">Estado</th>
                <th scope="col" width="12%">Fecha inicio</th>
                <th scope="col" width="12%">Fecha fin</th>
                <th scope="col" width="12%">Modalidad</th>
            </tr>
            </thead>
            <tbody class="tbody">
            @foreach($perfiles as $perfil)
                <tr class="tr">
                    <th scope="row">{{$perfil->id}}</th>
                    <td>{{$perfil->estudiantes()->pluck('nombres')->implode('-')}}</td>
                    <td>{{$perfil->titulo}}</td>
                    <td>{{$perfil->estado}}</td>
                    <td>{{$perfil->fecha_ini}}</td>
                    <td>{{$perfil->fecha_fin}}</td>
                    <td>{{$perfil->modalidad()->pluck('nombre_mod')->implode('-')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <li>No existen Perfiles</li>
    @endif
@endsection