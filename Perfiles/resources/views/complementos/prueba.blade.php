@extends('layouts.menu')
@section('titulo','Areas de la Carrera :')
@section('contenido')
{{$valor}}

<h1 style="text-align:center; font-size:50px; color:#fff">Modal Popup Box Login Form</h1>

<button onclick="document.getElementById('modal-wrapper').style.display='block'" style="width:200px; margin-top:200px; margin-left:160px;">
Open Popup</button>


  
<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
  </button>
@include('complementos.registro')




@endsection