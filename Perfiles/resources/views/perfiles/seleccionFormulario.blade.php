@extends('layouts.menu')
@section('titulo','SELECCIONE LA MODALIDAD DE SU PERFIL')
@section('contenido')
    <div class="container">
        @if($errors ->any())
            <div class="alert-danger">
                <h3>Se tiene los siguientes errores en el formulario</h3>
                <ul>
                    @foreach($errors->all() as $errors)
                        <li>{{$errors}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('formularioPerfil')}}">
            {!! csrf_field() !!}
            <div class="form-group row">
                <label for="modalidad" class="col-sm-3 col-form-label">Modalidad de su perfil</label>
                <div class="col-sm-6">
                    <select class="form-control" id="modalidad" name="modalidad">
                        <option>seleccione una opcion</option>
                        @foreach($modalidades as $modalidad)
                            <option>{{$modalidad}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="area" class="col-sm-3 col-form-label">Area de su perfil</label>
                <div class="col-sm-6">
                    <select class="form-control" id="area" name="area">
                        <option>seleccione una opcion</option>
                        @foreach($areas as $area)
                            <option value="{{$area->id}}">{{$area->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-7 offset-2 mt-4">
                    <a href="{{route('menu')}}" class="btn btn-danger mr-2">retornar menu</a>
                    <button type="submit"  class="btn btn-success ">Seleccionar</button>
                </div>
            </div>
        </form>
    </div>
@endsection