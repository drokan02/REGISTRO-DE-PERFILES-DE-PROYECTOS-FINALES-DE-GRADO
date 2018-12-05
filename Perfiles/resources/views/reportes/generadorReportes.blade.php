@extends('layouts.menu')
@section('titulo','GENERAR REPORTE')
@section('contenido')
    @if($errors ->any())
        <div class="alert-danger">
            <h3>Se tiene los siguientes errores en el formulario</h3>
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $errors)
                        <li>{{$errors}}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    @endif
    <form method="POST" action="{{route('generador')}}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="area" class="col-sm-2 col-form-label">Area</label>
            <div class="col-sm-7">
                <select class="form-control" id="area" name="area" value="{{old('area')}}">
                    <option>seleccione una opcion</option>
                    <option>Todos</option>
                    @foreach($areas as $area)
                        <option value="{{$area->id}}">{{$area->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="modalidad" class="col-sm-2 col-form-label">modalidad</label>
            <div class="col-sm-7">
                <select class="form-control" id="modalidad" name="modalidad">
                    <option>seleccione una opcion</option>
                    <option>Todos</option>
                    @foreach($modalidades as $modalidad)
                        <option value="{{$modalidad->id}}">{{$modalidad->nombre_mod}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="estado" class="col-sm-2 col-form-label">Estado Perfil</label>
            <div class="col-sm-7">
                <select class="form-control" id="estado" name="estado" value="{{old('estado')}}">
                    <option>seleccione una opcion</option>
                    <option>Todos</option>
                    @foreach($estados as $estado)
                        <option>{{$estado}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="tutor" class="col-sm-2 col-form-label">Tutor</label>
            <div class="col-sm-7">
                <select class="form-control" id="tutor" name="tutor" value="{{old('tutor')}}">
                    <option>seleccione una opcion</option>
                    <option>Todos</option>
                    @foreach($tutores as $tutor)
                        <option value="{{$tutor->id}}">{{$tutor->nombre_prof.' '.$tutor->ap_pa_prof.' '.$tutor->ap_ma_prof}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="cambio_tema" class="col-sm-2 col-form-label">Cambio de Tema</label>
            <div class="col-sm-7">
                <select class="form-control" id="cambio_tema" name="cambio_tema">
                    <option>seleccione una opcion</option>
                    <option value="3">Todos</option>
                    <option value="1">SI</option>
                    <option value="0">NO</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="trabajo_conjunto" class="col-sm-2 col-form-label">Trabajo Conjunto</label>
            <div class="col-sm-7">
                <select class="form-control" id="trabajo_conjunto" name="trabajo_conjunto">
                    <option>seleccione una opcion</option>
                    <option value="3">Todos</option>
                    <option value="1">SI</option>
                    <option value="0">NO</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-7 offset-2">
                <button type="submit" class="btn btn-success btn-lg">Generar Reporte</button>
            </div>
        </div>
    </form>
@endsection