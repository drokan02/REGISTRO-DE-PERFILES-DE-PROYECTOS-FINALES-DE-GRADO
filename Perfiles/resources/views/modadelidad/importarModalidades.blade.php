@extends('layouts.menu')
@section('titulo','Importar datos Modalidades')
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
    <form method="POST" action="{{route('importacionModalidad')}}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group mb-4">
            <label for="importar_modalidad">Importar Modalidades</label>
            <input type="file" class="form-control" id="importar_modalidad" name="importar_modalidad" value="{{old('importar_modalidad')}}">
        </div>
        <a href="{{route('modalidad')}}" class="btn btn-outline-primary btn-lg">Lista Modalidades</a>
        <button type="submit" class="btn btn-outline-success btn-lg">Importar</button>
    </form>
@endsection