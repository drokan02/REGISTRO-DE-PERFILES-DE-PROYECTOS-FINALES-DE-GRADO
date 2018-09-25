@extends('layouts.menu')
@section('titulo','REGISTRAR TUTOR')
@section('contenido')

<form>
	<div class= "container" >
		<div class = "form-group row">
			<div class="col-2"></div>
			<div class = "col-8">
				
				<!--Nombre area -->
				<div class = "form-group row"> 
					<label for="cod_area" class="col-sm-2 col-form-label">Nombre</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="cod_area" value="{{old('cod_area')}}">
					</div>
				</div>

                
				<div class = "form-group row"> 
					<label for="cod_area" class="col-sm-2 col-form-label">Apellido Paterno</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="cod_area" value="{{old('cod_area')}}">
					</div>
				</div>

               
				<div class = "form-group row"> 
					<label for="cod_area" class="col-sm-2 col-form-label">Apellido Maternos</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="cod_area" value="{{old('cod_area')}}">
					</div>
				</div>

                
				<div class = "form-group row"> 
					<label for="cod_area" class="col-sm-2 col-form-label">Correo</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="cod_area" value="{{old('cod_area')}}">
					</div>
				</div>

                
				<div class = "form-group row"> 
					<label for="cod_area" class="col-sm-2 col-form-label">Telefono</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="cod_area" value="{{old('cod_area')}}">
					</div>
				</div>

                
				<div class = "form-group row"> 
					<label for="cod_area" class="col-sm-2 col-form-label">Direccion</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="cod_area" value="{{old('cod_area')}}">
					</div>
				</div>

                
				<div class = "form-group row"> 
					<label for="cod_area" class="col-sm-2 col-form-label">Perfil</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="cod_area" value="{{old('cod_area')}}">
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