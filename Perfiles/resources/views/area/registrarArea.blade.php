@extends('layouts.menu')
@section('titulo','REGISTRAR AREA')
@section('contenido')

<form>
	<div class= "container" >
		<div class = "form-group row">
			<div class="col-2"></div>
			<div class = "col-8">
				<div class = "form-group row"> 
					<label for="cod_area" class="col-sm-2 col-form-label">Nombre</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="cod_area" value="{{old('cod_area')}}">
					</div>
				</div>
				<!--Nombre area -->
				<div class = "form-group row"> 
					<label for="cod_area" class="col-sm-2 col-form-label">Nombre</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="cod_area" value="{{old('cod_area')}}">
					</div>
				</div>
	
				<div class = "form-group row">
					<label for="desc_area" class="col-sm-2 col-form-label">Descripsion</label>
					<div class="col-sm-8">
						<textarea class="form-control" id="desc_area" value="{{old('desc_area')}}" rows="5"></textarea>
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