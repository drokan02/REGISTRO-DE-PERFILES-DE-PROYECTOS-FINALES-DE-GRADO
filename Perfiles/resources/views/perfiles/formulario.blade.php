@extends('layouts.menu')
@section('titulo','SELECCIONE LA MODALIDAD DE SU PERFIL')
@section('contenido')
    <div class="container">
        <form method="POST" action="{{route('mostrarFormulario')}}">
            {!! csrf_field() !!}
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <label for="modalidad_id" class="col-sm-2 col-form-label">Modalidad de perfil</label>
                <div class="col-sm-6">
                    <select class="form-control" id="modalidad" name="modalidad_id">
                        <option>seleccione una opcion</option>
                        @foreach($modalidades as $modalidad)
                             <option value="{{$modalidad->id}}">{{$modalidad->nombre_mod}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        <div class="col-sm-12" id="contenidoForm">
                
        </div>
    </div>
@endsection