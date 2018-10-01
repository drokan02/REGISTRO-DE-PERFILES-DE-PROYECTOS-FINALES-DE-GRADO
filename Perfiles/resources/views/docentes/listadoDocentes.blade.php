@extends('layouts.menu')
@section('titulo','LISTA DE DOCENTES UMSS')
@section('contenido')
    <div class="row mb-3">
        <div class="col-8 offset-1">
            <form method="GET" action="{{route('docentes')}}" class="form-inline">
                <div class="form-group">
                    <input class="form-control" name="name" placeholder="Buscar">
                    <button type="submit" class=" btn btn-success">Buscar</button>
                </div>
            </form>
        </div>
        
    </div>
   
@endsection
