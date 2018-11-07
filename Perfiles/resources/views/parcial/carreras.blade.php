@if($carreras->isNotEmpty())
    <table class="table  table-hover text-center">
        <thead class="thead">
        <tr class="tr">
            <th >#</th>
            <th >Codigo Carrera</th>
            <th >Carrera</th>
            <th >Acciones</th>
        </tr>
        </thead>
        <tbody class="tbody">
        @foreach($carreras as $carrera)
            <tr class="tr">
                <td scope="row">{{$carrera->id}}</td>
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
<script src={{asset('js/eliminar.js')}}></script>