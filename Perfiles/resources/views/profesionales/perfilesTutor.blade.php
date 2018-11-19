@extends('layouts.menu')
@section('titulo',"TUTOR(A) : $profesional->ap_pa_prof $profesional->ap_ma_prof $profesional->nombre_prof")
@section('contenido')

<Form method="GET" action="{{route('tutoriaProfesional',$profesional)}}" >
    {!! csrf_field() !!}
    <div class="col-sm-12">
        <div class="form-group row">
            <div class=" col-sm-3 offset-md-4 ">       
                            <input type="search" placeholder="&#xF002; Buscar" style="font-family:Time, FontAwesome" class="form-control " 
                            name="buscar" autofocus value="{{$buscar}}" autocomplete="off" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">   
            </div>          
            <div class="col-sm-0">
                            <button class=" btn btn-success pull-left btnBuscar"> Buscar</button>
            </div>
            <div class="col-sm-4 offset-md-0">
                <a href="{{route('listarProfesionales')}}"" >
                                <!--class=pull-right  para poner el boton al extremo derecho-->
                                <i class="fa fa-share fa-2x pull-right" data-toggle="tooltip" data-placement="right" title="Volver Atras" ></i>                 
                    </a> 
            </div>
        </div>        
    </div> 
</Form>
    <div class="listaDatos ">
    @if ($perfiles->isNotEmpty())
    <h5><b>Perfiles</b> </h5>
        <table class=" table  table-hover  " id="listaArea">
            <thead class="thead text-center">
            <tr class="tr">
                <th style="width: 3%; text-align: center;">N°</th>
                <th style="width: 20%;">Titulo</th>
                <th style="width: 30%;">Descripcion</th>
                <th style="width: 10%; ">Autores</th>
                <th style="width: 7%; ">Estado</th>
                <th style="width: 5%;">Renunciar</th>
            </tr>
            </thead>
            <tbody class="tbody">

                @foreach ($perfiles as $perfil)
                    <tr class="tr">
                        <td style="text-align: center;">{{$fila++}}</td>
                        <td>{{$perfil->titulo}}</td>
                        <td class="descripcion" style="width: 30%;">{{$perfil->descripcion}}</td>
                        <td>{{$perfil->estudiantes->pluck('nombres')->implode(' - ')}}</td>
                        <td style="text-align: center">{{$perfil->estado}}</td>
                        <td style="text-align: center" >
                            <a href='{{ route('renunciarTutoria',['perfil'=>$perfil,'profesional'=>$profesional])}}' 
                                class="renunciarTutoria"  data-placement="right" title="renunciar Tutoria">
                                <i class="fa fa-times iconMenu fa-2x" ></i>
                            </a> 
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