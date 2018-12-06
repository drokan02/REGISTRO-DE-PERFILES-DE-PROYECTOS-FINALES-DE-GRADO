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
<script src={{asset('js/eliminar.js')}}></script>