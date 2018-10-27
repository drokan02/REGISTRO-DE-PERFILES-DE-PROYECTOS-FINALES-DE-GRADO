@extends('layouts.menu')
@section('titulo','Importar datos Carreras')
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
    <form method="POST" action="{{route('importacionCarrera')}}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group mb-4">
            <label for="importar_carreras">Importar carreras</label>
            <input type="file" class="form-control" id="importar_carreras" name="importar_carreras" value="{{old('importar_carreras')}}">
        </div>
        <a href="{{route('carreras')}}" class="btn btn-outline-primary btn-lg">Lista Carreras</a>
        <button type="submit" class="btn btn-outline-success btn-lg">Importar</button>
    </form>
@endsection