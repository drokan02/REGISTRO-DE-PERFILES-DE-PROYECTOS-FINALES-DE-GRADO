@extends('layouts.menu')
@section('titulo','EDITAR MODALIDAD')
@section('contenido')

<!--ERRORES-->
	<!--@include('complementos.error')-->				
<!--FIN ERRORES-->
	<div class="row justify-content-center mt-4">
		<div class= "col-sm-9" style="left: 100px;" >
			<form method="POST" action="{{route('modificarModalidad',['modalidad'=>$modalidad])}}">
				{{method_field('PUT')}}
				{!! csrf_field() !!}
				<div class = "form-group row">
					<label for="nombre_mod" class="col-sm-2 col-form-label">Nombre</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" placeholder="" name="nombre_mod" autocomplete="off"
								value="{{old('nombre_mod',$modalidad->nombre_mod)}}">
					</div>
				</div>

				<div class = "form-group row"> 
					<label for="codigo_mod" class="col-sm-2 col-form-label">Codigo</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" placeholder="" name="codigo_mod" autocomplete="off"
						value= {{old('codigo_mod',$modalidad->codigo_mod)}}>
					</div>
				</div>
	
				<div class = "form-group row">
					<label for="descripsion_mod" class="col-sm-2 col-form-label">Descripcion</label>
					<div class="col-sm-7">
						<textarea class="form-control" placeholder="" autocomplete="off"
						name="descripsion_mod" rows="5">{{old('descripsion_mod',$modalidad->descripsion_mod)}}</textarea>
					</div>
					
				</div>

				<div class = "form-group row"> 
					<div class="col-sm-2"></div>
					<div class="col-7">
						<a href="{{ route('modalidad') }}" class="btn btn-danger">Cancelar</a>	
						<button type="submit" class='btn btn-success registrar'>Modificar</button>
					</div>
				</div>
			</form>
		</div>
		
	</div>
@endsection