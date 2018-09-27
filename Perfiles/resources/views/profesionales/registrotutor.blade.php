@extends('layouts.menu')
@section('titulo','REGISTRAR TUTOR')
@section('contenido')

<form>
	<div class= "container" >
		<div class = "form-group row">
			<div class="col-2"></div>
			<div class = "col-8">
				
				<!--Nombre tutor -->
				<div class = "form-group row"> 
					<label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="nombre[]" value="{{old('nombre')}}">
						
					
					</div>
				</div>

                
				<div class = "form-group row"> 
					<label for="apellidoparterno" class="col-sm-2 col-form-label">Apellido Paterno</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="apellidopaterno" value="{{old('apellidopaterno')}}">
					</div>
				</div>

               
				<div class = "form-group row"> 
					<label for="apellidomaterno" class="col-sm-2 col-form-label">Apellido Maternos</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="apellidomaterno" value="{{old('apellidomaterno')}}">
					</div>
				</div>

				<div class = "form-group row"> 
					<label for="ci" class="col-sm-2 col-form-label">CI</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="ci" value="{{old('ci')}}">
					</div>
				</div>

                
				<div class = "form-group row"> 
					<label for="correo" class="col-sm-2 col-form-label">Correo</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="cod_area" value="{{old('correo')}}">
					</div>
				</div>

                
				<div class = "form-group row"> 
					<label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="cod_area" value="{{old('telefono')}}">
					</div>
				</div>

                
				<div class = "form-group row"> 
					<label for="direccion" class="col-sm-2 col-form-label">Direccion</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="cod_area" value="{{old('direccion')}}">
					</div>
				</div>

                
				<div class = "form-group row"> 
					<label for="perfil" class="col-sm-2 col-form-label">Perfil</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="cod_area" value="{{old('perfil')}}">
					</div>
				</div>

				<div class = "form-group row"> 
					<label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="cod_area" value="{{old('titulo')}}">
					</div>
				</div>

				<div class = "form-group row"> 
					<label for="cargahoraria" class="col-sm-2 col-form-label">Carga Horaria</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="cod_area" value="{{old('cargahoraria')}}">
					</div>
				</div>

				<div class = "form-group row"> 
					<label for="codigosis" class="col-sm-2 col-form-label">CodigoSIS</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="cod_area" value="{{old('codigosis')}}">
					</div>
				</div>
	
				

				<div class = "form-group row"> 
					<div class="col-sm-2"></div>
					<div class="col-8">
							<button type="submit" class='btn btn-danger' >Cancelar</button>
							<button type="submit" class='btn btn-success'>Registrar</button>
					</div>
					
						
				</div>
			</div>
		</div>
	</div>
</form>
@endsection