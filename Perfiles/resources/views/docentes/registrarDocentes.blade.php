@extends('layouts.menu')
@section('titulo','REGISTRAR DOCENTE')
@section('contenido')

<!--ERRORES-->
	@include('complementos.error')				
<!--FIN ERRORES-->
	<div class= "container" >
		<form method="POST" action="{{route('almacenarDocente')}}">
			{!! csrf_field() !!}
			<div class = "form-group row">
				<div class="col-2"></div>
				<div class = "col-8">
					
					<div class = "form-group row"> 
						<label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="nombre" name="nombre" autocomplete="off"
							value="{{old('nombre')}}">
						</div>
					</div>
					<!--APELLIDO PARTERNO -->
					<div class = "form-group row"> 
						<label for="apellidoP" class="col-sm-2 col-form-label">Apellido Paterno</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="Apellido Paterno" name="apellidoP" autocomplete="off"
							value="{{old('apellidoP')}}">
						</div>
					</div>
		
					<div class = "form-group row">
						<label for="apellidoM" class="col-sm-2 col-form-label">Apellido Materno</label>
						<div class="col-sm-8">
							<input tipo="text" class="form-control" placeholder="Apellido Materno"name="apellidoM"  autocomplete="off"
							value="{{old ('apellidoM')}}">
						</div>
						
                    </div>
                    <div class = "form-group row"> 
						<label for="nombre" class="col-sm-2 col-form-label">CI</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="CI" name="nombre" autocomplete="off"
							value="{{old('nombre')}}">
						</div>
					</div>
					<!--Telefono -->
					<div class = "form-group row"> 
						<label for="apellidoP" class="col-sm-2 col-form-label">Telefono</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="Telefono" name="apellidoP" autocomplete="off"
							value="{{old('apellidoP')}}">
						</div>
					</div>
		
					<div class = "form-group row">
						<label for="carga_horaria" class="col-sm-2 col-form-label">Carga Horaria</label>
						<div class="col-sm-8">
							<input tipo="text" class="form-control" placeholder="Carga Horaria"name="carga_horaria"  autocomplete="off"
							value="{{old ('carga_horaria')}}">
						</div>
						
                    </div>
                    <div class = "form-group row"> 
						<label for="profesional_id" class="col-sm-2 col-form-label">Profesional_id</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="Area" name="profesional_id" autocomplete="off"
							value="{{old('profesional_id')}}">
						</div>
					</div>
					<!--codigo sis -->
					<div class = "form-group row"> 
						<label for="codigo_sis" class="col-sm-2 col-form-label">Codigo SIS</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="Codigo SIS" name="codigo_sis" autocomplete="off"
							value="{{old('codigo_sis')}}">
						</div>
					</div>
		
					<div class = "form-group row">
						<label for="apellidoM" class="col-sm-2 col-form-label">Correo</label>
						<div class="col-sm-8">
							<input tipo="text" class="form-control" placeholder="Correo"name="apellidoM"  autocomplete="off"
							value="{{old ('apellidoM')}}">
						</div>
						
                    </div>
                    <div class = "form-group row"> 
						<label for="nombre" class="col-sm-2 col-form-label">Titulo</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="Titulo" name="nombre" autocomplete="off"
							value="{{old('nombre')}}">
						</div>
					</div>
					<!--SubAreas -->
					<div class = "form-group row"> 
						<label for="apellidoP" class="col-sm-2 col-form-label">SubArea</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" placeholder="SubArea" name="apellidoP" autocomplete="off"
							value="{{old('apellidoP')}}">
						</div>
					</div>
		
					

					<div class = "form-group row"> 
						<div class="col-sm-2"></div>
						<div class="col-8">
							<a href="{{ route('registrarDocente') }}" class="btn btn-danger">Cancel</a>	
							<button type="submit" class='btn btn-success'>Registrar</button>
						</div>
						
							
					</div>
				</div>
			</div>
		</form>
	</div>

@endsection
