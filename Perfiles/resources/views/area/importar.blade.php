@extends('layouts.menu')
@section('titulo','Cargar Datos de Areas')
@section('contenido')
<div class="container">
    <div class="row offset-11">
        <div class="col">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal1">Ayuda <i class="fa fa-question-circle"></i></button>
            <div class="modal fade" id="modal1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="close">&times;</button>
                        </div>
                        <div class="modal-body">
                            <h5>* El archivo excel debe tener las columnas:</h5>
                            <p>  - id , codigo , nombre , descripcion , area_id</p>
                            <h5>* Campo id debe empezar desde {{$area}} para adelante</h5>
                            <p>(Para que no haya conflictos con las areas registradas anteriormente)</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
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
        <button type="submit" class="btn btn-outline-success btn-lg"
                onclick="alert('Si no se cumplen las condiciones de ayuda es posible que no se' +
                 ' pueda importar')">Importar</button>
    </form>
</div>
@endsection