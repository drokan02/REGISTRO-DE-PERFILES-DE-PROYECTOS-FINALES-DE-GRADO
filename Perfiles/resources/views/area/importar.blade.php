@extends('layouts.menu')
@section('titulo','Cargar Datos de Areas')
@section('contenido')
<div class="container">
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
    <form method="POST" action="{{route('importarAreas')}}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group mb-4">
            <label for="importar_area">Importar Areas</label>
            <input type="file" class="form-control" id="importar_area" name="importar_area" value="{{old('importar_area')}}">
        </div>
        <a href="{{route('Areas')}}" class="btn btn-outline-primary btn-lg">Lista areas</a>
        <button type="submit" class="btn btn-outline-success btn-lg">Importar</button>
    </form>
</div>
@endsection