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
                <th scope="col">Email</th>
                <th scope="col">Titulo</th>
                
            </tr>
            </thead>
            <tbody>
                @foreach ($profesionales as $profesional)
                    <tr>
                        <td style="text-align: right;">{{$fila++}}</td>
                        <td>{{$profesional->nombre_prof}}</td>
                        <td>{{$profesional->ap_pa_prof}}</td>
                        <td>{{$profesional->ap_ma_prof}}</td>
                        <td>{{$profesional->ci_prof}}</td>
                        <td>{{$profesional->telef_prof}}</td>
                        <td>{{$profesional->direc_prof}}</td>
                        <td>{{$profesional->perfil_prof}}</td>
                        <td>{{$profesional->correo_prof}}</td>
                        <td>{{DB::table('titulos')->where('id', $profesional->titulo_id)->get()}}</td>
                        <td>
                            
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
    @else
        <li>No hay Tutor</li>
    @endif
@endsection