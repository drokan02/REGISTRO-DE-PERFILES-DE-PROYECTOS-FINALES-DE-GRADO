@extends('layouts.menu')
@section('titulo','REGISTRAR AREA')
@section('contenido')

<!--ERRORES-->
	@include('complementos.error')				
<!--FIN ERRORES-->	

	<div class="row justify-content-center mt-4">
		<div class= "col-sm-9" style="left: 100px;">
			<form >
				{!! csrf_field() !!}
						<div class = "form-group row"> 
							<label for="codigo" class="col-sm-2 col-form-label">Fecha inicio</label>
							<div class="col-sm-7">
                                <input class="fecha_in" id="fecha_ini" placeholder="Seleccione una fecha" disabled>
                                <script>
                                   
                                </script>
							</div>
						</div>
						<!--Nombre area -->
						<div class = "form-group row"> 
							<label for="nombre" class="col-sm-2 col-form-label">fecha Fin</label>
							<div class="col-sm-7">
								<input id="fecha_fin" placeholder="Seleccione una fecha" disabled>
                                <script>
                                    $('#fecha_fin').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
							</div>
						</div>
			
						<div class = "form-group row">
							<label for="descripcion" class="col-sm-2 col-form-label">Periodo</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" disabled>
							</div>
							
						</div>
		
						<div class = "form-group row"> 
							<div class="col-sm-2"></div>
							<div class="col-8">
								<a href="{{ route('registrarArea') }}" class="btn btn-danger">Cancel</a>	
								<button type="submit" class='btn btn-success prueba'>Registrar</button>
							</div>		
						</div>
			</form>
		</div>
	</div>
@endsection