@extends('layouts.menu')
@section('titulo','REGISTRAR AREA')
@section('contenido')

<form>
	<div class= "container" >
		<div class = "form-group row">
			<div class="col-2"></div>
			<div class = "col-8">
				<div class = "form-group row"> 
					<label for="codigo" class="col-sm-2 col-form-label">Nombre</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="codigo" value="{{old('codigo')}}">
					</div>
				</div>
				<!--Nombre area -->
				<div class = "form-group row"> 
					<label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="nombre" value="{{old('nombre')}}">
					</div>
				</div>
	
				<div class = "form-group row">
					<label for="descripsion" class="col-sm-2 col-form-label">Descripsion</label>
					<div class="col-sm-8">
						<textarea class="form-control" id="descripsion" value="{{old('descripsion')}}" rows="5"></textarea>
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