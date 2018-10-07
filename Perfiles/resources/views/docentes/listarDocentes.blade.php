@extends('layouts.menu')
@section('titulo','LISTAR DOCENTES')
@section('content')

<div class="title_right">
    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-grup">
            {<!!Form:get></!!Form:get>::open(['route'=>'docentes.listarDocentes','method'=>'GET','class'=>'navbar-form navbar-left','role'=>'search'])!!}
               {<!!Form:get></!!Form:get>::text('name',null,['class'=>'form-control','placeholder'=>'Buscar...','style'=>'width:80;'])!!}
               <span class="input-group-btn">

                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
               </span>
               {<!!Form:get></!!Form:get>::close()!!}
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
            }
@endsection