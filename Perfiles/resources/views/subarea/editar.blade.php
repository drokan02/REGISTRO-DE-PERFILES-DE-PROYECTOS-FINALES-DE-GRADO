@extends('layouts.menu')
@section('titulo','EDITAR SUBAREA')
@section('contenido')

<!--ERRORES-->
	@include('complementos.error')				
<!--FIN ERRORES-->

	<div class= "container" >
		<form method="POST" action="{{route('modificarSubarea',$subarea->id)}}">
			{!! csrf_field() !!}
			<div class = "form-group row">
				<div class="col-2"></div>
				<div class = "col-8">
					
					<div class = "form-group row"> 
						<label for="codigo" class="col-sm-2 col-form-label">Codigo</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="codigo area" name="codigo" autocomplete="off"
							value="{{old('codigo',$subarea->codigo)}}">
						</div>
					</div>
					<!--Nombre area -->
					<div class = "form-group row"> 
						<label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="nombre area" name="nombre" autocomplete="off"
							value="{{old('nombre',$subarea->nombre)}}">
						</div>
					</div>
		
					<div class = "form-group row">
						<label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
						<div class="col-sm-8">
							<textarea class="form-control" placeholder="descripcion no obligatoria" autocomplete="off"
							name="descripcion" rows="5">{{old('descripcion',$subarea->descripcion)}}</textarea>
						</div>
						
					</div>

					<div class = "form-group row"> 
						<div class="col-sm-2"></div>
						<div class="col-8">
							<a href="{{ route('subareas',$area) }}" class="btn btn-danger">Cancel</a>	
							<button type="submit" class='btn btn-success'>Registrar</button>
						</div>
						
							
					</div>
				</div>
			</div>
		</form>
	</div>

@endsection