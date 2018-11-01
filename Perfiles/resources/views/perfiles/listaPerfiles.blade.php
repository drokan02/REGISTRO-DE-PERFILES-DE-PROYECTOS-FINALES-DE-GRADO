@extends('layouts.menu')
@section('titulo','LISTA DE PERFILES DE PROYECTO DE GRADO')
@section('contenido')

<Form method="GET" action="{{route('perfiles')}}" >
    <!--BUSCADOR -->
    <div class="container">
       <div class="container col-sm-6">
           
            <div class="form-group row">

                <label for="cargahoraria_id" class="col-sm-2 col-form-label">Modalidad</label>
                <div class="col-sm-10 " >
                        <select name="cargahoraria_id" id="cargahoraria_id" class="form-control" >
                            <option disabled selected > seleccionar </option>
                        </select>
                </div>
            </div>
       </div>
        <div class="form-group row">
            <div class="col-sm-4"></div>
            <div class=" col-4">       
                            <input type="search" placeholder="&#xF002; Buscar" style="font-family:Time, FontAwesome" class="form-control buscar" 
                            name="buscar" autofocus value="{{$buscar}}" autocomplete="off" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">   
            </div>          
            <div class="col-sm-0">
                            <button class=" btn btn-success pull-left"> Buscar</button>
            </div>
            
        </div>        
    </div> 

    <div class="listaDatos">
        <table class=" table table-hover table-bordered-primary" id="listaArea">
            <thead class="thead">
            <tr class="tr">
                <th style="width: 3%; text-align: center;">N°</th>
                <th style="width: 20%;">Titulo</th>
                <th style="width: 30%;">Descripcion</th>
                <th style="width: 10%; ">Autores</th>
                <th style="width: 10%; ">Tutor</th>
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
                            {{$perfil->tutor->ap_pa_prof}}
                            {{$perfil->tutor->ap_ma_prof}}
                            {{$perfil->tutor->nombre_prof}}
                        </td>
                        <td>
                            <div class=" dropleft text-center">
                                    <a href="#" data-toggle="dropdown"  data-placement="right" title="opsiones">
                                            <i class="fa fa-ellipsis-v fa-2x" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <a href='{{ route('verPerfil',$perfil)}}' class="dropdown-item" href="#">
                                                    <h5><i class="col-sm-3 fa fa-eye iconMenu" >&nbsp;&nbsp;&nbsp;Ver </i></h5>
                                            </a>
                                            <a href='{{ route('editarPerfil',$perfil)}}' class="dropdown-item" href="#">
                                                    <h5><i class="col-sm-3 fa fa-pencil-square-o iconMenu">&nbsp;&nbsp;&nbsp;Editar</i></h5>
                                            </a>
                                            <a href='{{ route('eliminarPerfil',$perfil)}}' class="dropdown-item eliminar" href="#">
                                                    <h5> <i class="col-sm-3 fa fa-minus-square iconMenu" >&nbsp;&nbsp;&nbsp;Eliminar</i></h5>
                                            </a>                                                    
                                    </div>
                            </div> 
                        </td>
                    </tr>   
                @endforeach
                </tbody>
        </table>
        {!! $perfiles->render() !!}
        
    </div>

</Form>
@endsection