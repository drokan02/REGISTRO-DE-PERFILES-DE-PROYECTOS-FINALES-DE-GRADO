@extends('layouts.menu')
@section('titulo','LISTA DE PERFILES DE PROYECTO DE GRADO')
@section('contenido')

<Form method="GET" action="{{route('perfiles')}}" >
    {!! csrf_field() !!}
    
       <div class="col-sm-12">
           
            <div class="form-group row">
                <div class="col-sm-1"></div>
                <label for="anio" class="col-sm-0 col-form-label">Anio</label>
                <div class="col-sm-2 " >
                        <select name="anio" id="anio" class="form-control" >
                            <option disabled selected > seleccionar </option>
                            @foreach ($anios as $anio)
                            <option  > {{$anio->year}} </option> 
                            @endforeach
                        </select>
                </div>

                <label for="periodo" class="col-sm-0 col-form-label">Periodo</label>
                <div class="col-sm-2 " >
                        <select name="periodo" id="periodo" class="form-control" >
                            <option disabled selected > seleccionar </option>
                            @foreach ($periodos as $periodo)
                            <option  > {{$periodo}} </option> 
                            @endforeach
                        </select>
                </div>

                <label for="modalidad_id" class="col-sm-0 col-form-label">Modalidad</label>
                <div class="col-sm-2 " >
                        <select name="modalidad_id" id="modalidad_id" class="form-control" >
                            <option disabled selected > seleccionar </option>
                            @foreach ($modalidades as $modalidad)
                            <option value="{{$modalidad->id}}" > {{$modalidad->nombre_mod}} </option> 
                            @endforeach
                        </select>
                </div>

                <label for="tutor_id" class="col-sm-0 col-form-label">Tutor</label>
                <div class="col-sm-3 " >
                        <select name="tutor_id" id="tutor_id" class="form-control" >
                            <option disabled selected > seleccionar </option>
                            @foreach ($profesionales as $tutor)
                            <option  value="{{$tutor->id}}"> {{$tutor->ap_pa_prof}} {{$tutor->ap_ma_prof}} {{$tutor->nombre_prof }} </option> 
                            @endforeach
                        </select>
                </div>

       </div>
        <div class="form-group row">
            <div class=" col-sm-4 offset-md-4">       
                            <input type="search" placeholder="&#xF002; Buscar" style="font-family:Time, FontAwesome" class="form-control " 
                            name="buscar" autofocus value="{{$buscar}}" autocomplete="off" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">   
            </div>          
            <div class="col-sm-0">
                            <button class=" btn btn-success pull-left btnBuscar"> Buscar</button>
            </div>
            
        </div>        
    </div> 
</Form>
    <div class="listaDatos ">
    @if ($perfiles->isNotEmpty())
        <table class=" table  table-hover  " id="listaArea">
            <thead class="thead text-center">
            <tr class="tr">
                <th style="width: 3%; text-align: center;">N°</th>
                <th style="width: 20%;">Titulo</th>
                <th style="width: 30%;">Descripcion</th>
                <th style="width: 10%; ">Autores</th>
                <th style="width: 10%; ">Tutor</th>
                <th style="width: 7%; ">Estado</th>
                <th style="width: 5%;">Opciones</th>
            </tr>
            </thead>
            <tbody class="tbody">

                @foreach ($perfiles as $perfil)
                    <tr class="tr">
                        <td style="text-align: center;">{{$fila++}}</td>
                        <td>{{$perfil->titulo}}</td>
                        <td class="descripcion" style="width: 30%;">{{$perfil->descripcion}}</td>
                        <td>{{$perfil->estudiantes->pluck('nombres')->implode(' - ')}}</td>
                        <td>
                            {{$perfil->tutor[0]->ap_pa_prof}}
                            {{$perfil->tutor[0]->ap_ma_prof}}
                            {{$perfil->tutor[0]->nombre_prof}}
                        </td>
                        <td style="text-align: center">{{$perfil->estado}}</td>
                        <td>
                            <div class=" dropleft text-center">
                                    <a href="#" data-toggle="dropdown"  data-placement="right" title="opsiones">
                                            <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <a href='{{route('verPerfil',$perfil)}}' class="dropdown-item" href="#">
                                                    <h5><i class="col-sm-3 fa fa-eye iconMenu" >&nbsp;&nbsp;&nbsp;Ver </i></h5>
                                            </a>
                                        @if(auth()->user()->hasPermisos(['editar_perfil']))
                                            <a href='{{route('editarPerfil',$perfil)}}' class="dropdown-item" href="#">
                                                    <h5><i class="col-sm-3 fa fa-pencil-square-o iconMenu">&nbsp;&nbsp;&nbsp;Editar</i></h5>
                                            </a>
                                        @endif
                                        @if(auth()->user()->hasPermisos(['eliminar_perfil']))
                                            <a href='{{ route('eliminarPerfil',$perfil)}}' class="dropdown-item eliminar" href="#">
                                                    <h5> <i class="col-sm-3 fa fa-minus-square iconMenu" >&nbsp;&nbsp;&nbsp;Eliminar</i></h5>
                                            </a>
                                        @endif
                                        @if(auth()->user()->hasPermisos(['eliminar_perfil']))
                                            <a  href="{{ route('cambiarEstadoPerfil',$perfil)}}" class="dropdown-item estado" href="#" data-toggle="modal" data-target="#exampleModalCenter" 
                                            data-perfil="{{$perfil}}" data-ruta="{{ route('cambiarEstadoPerfil',$perfil)}}">
                                                <h5> <i class="col-sm-3 fa fa-minus-square iconMenu" >&nbsp;&nbsp;&nbsp;Estados</i></h5>
                                            </a>
                                        @endif
                                    </div>
                            </div> 
                        </td>
                    </tr>   
                @endforeach
                </tbody>
            </table>
            @include('complementos.estadosPerfil') 
            {!! $perfiles->render() !!}
        @else
            <li>No se encontro Perfiles registrados</li>
        @endif
    </div>
    
</Form>
@endsection