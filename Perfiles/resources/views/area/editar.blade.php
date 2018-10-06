@extends('layouts.menu')
@section('titulo','EDITAR AREA')
@section('contenido')

<!--ERRORES-->
	@include('complementos.error')				
<!--FIN ERRORES-->
	<div class= "container" >
		<form method="POST" action="{{route('modificarArea',$area->id)}}">
			{!! csrf_field() !!}
			<div class = "form-group row">
				<div class="col-2"></div>
				<div class = "col-8">
					
					<div class = "form-group row"> 
						<label for="codigo" class="col-sm-2 col-form-label">Codigo</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="codigo area" name="codigo" autocomplete="off"
							value= {{old('codigo',$area->codigo)}}>
						</div>
					</div>
					<!--Nombre area -->
					<div class = "form-group row"> 
						<label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="nombre area" name="nombre" autocomplete="off"
							value="{{old('nombre',$area->nombre)}}">
						</div>
					</div>
		
					<div class = "form-group row">
						<label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
						<div class="col-sm-8">
							<textarea class="form-control" placeholder="descripcion no obligatoria" autocomplete="off"
							name="descripcion" rows="5">{{old('descripcion',$area->descripcion)}}</textarea>
						</div>
						
					</div>

					<div class = "form-group row"> 
						<div class="col-sm-2"></div>
						<div class="col-8">
							<a href="{{ route('Areas') }}" class="btn btn-danger">Cancel</a>	
							<button type="submit" class='btn btn-success'>Modificar</button>
						</div>
						
							
					</div>
				</div>
			</div>
		</form>
	</div>

@endsection