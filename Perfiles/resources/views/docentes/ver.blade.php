@extends('layouts.menu')
@section('titulo','DOCENTE')
@section('contenido')

    <ul class="nav justify-content-end ">
        <li class="nav-item">
            <a class="nav-link" href="{{route('editarDocente',$docente)}}">Modifica tus datos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('cambiarContraseñaDocente',$docente)}}">Cambiar Contraseña</a>
        </li>
    </ul>



    <div class="listaDatos">
        <table class="table">
            <thead class="thead">
            <tr class="tr">
                <th class="h1 " scope="col">Informacion Basica</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="tbody">
            <tr class="tr">
                <td>Nombre de Docente: </td>
                <td>{{$profesional->nombre_prof.' '.$profesional->ap_pa_prof.' '.$profesional->ap_ma_prof}}</td>

            </tr>
            <tr class="tr">
                <td>Codigo SIS</td>
                <td>{{$docente->codigo_sis}}</td>
            </tr>
            <tr class="tr">
                <td>Titulo Profesional</td>
                <td>{{$profesional->titulo()->pluck('nombre')->implode(' - ')}}</td>
            </tr>
            <tr class="tr">
                <td>Carrera del Docente</td>
                <td>{{$docente->profesional()->first()->carrera()->pluck('nombre_carrera')->implode(' - ')}}</td>
            </tr>
            </tbody>
        </table>
        <table class="table">
            <thead class="thead">
            <tr class="tr">
                <th class="h1" scope="col">Informacion Personal</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="tbody">
            <tr class="tr">
                <td>Nombre : </td>
                <td>{{$profesional->nombre_prof.' '.$profesional->ap_pa_prof.' '.$profesional->ap_ma_prof}}</td>
            </tr>
            <tr class="tr">
                <td>Correo Electronico</td>
                <td>{{$profesional->correo_prof}}</td>
            </tr>
            <tr class="tr">
                <td>Carnet Identidad: </td>
                <td>{{$profesional->ci_prof}}</td>
            </tr>
            <tr class="tr">
                <td>Area: </td>
                <td>{{$profesional->areas()->pluck('nombre')->implode(' - ')}}</td>
            </tr>
            <tr class="tr">
                <td>Carga Horaria: </td>
                <td>{{$docente->cargahoraria()->pluck('carga_horaria')->implode(' - ')}}</td>
            </tr>
            <tr class="tr">
                <td>Telefono: </td>
                <td>{{$profesional->telef_prof}}</td>
            </tr>
            <tr class="tr">
                <td>direccion: </td>
                <td>{{$profesional->direc_prof}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection