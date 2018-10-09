@extends('layouts.menu')
@section('titulo','LISTA DE TUTOR')
@section('contenido')

@foreach ( $profesionales as $profesional)
    {{$profesional->areas->pluck('nombre')->implode('')}}
@endforeach

@endsection