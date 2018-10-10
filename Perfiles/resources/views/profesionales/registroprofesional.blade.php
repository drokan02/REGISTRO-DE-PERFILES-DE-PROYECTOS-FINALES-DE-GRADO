@extends('layouts.menu')
@section('titulo','REGISTRAR PROFESIONAL')
@section('contenido')

   <div class="row justify-content-center mt-4">
        <div class="col-6">
            
           <!-- @if($errors ->any())
                <div class="alert-danger">
                    <h3>Se tiene los siguientes errores en el formulario</h3>
                    <ul>
                        @foreach($errors->all() as $errors)
                            <li>{{$errors}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif-->
             
            <form method="POST" action="{{route('storeProfesional')}}">
                {!! csrf_field() !!}


	
				
				<!--Nombre tutor -->
				<div class = "form-group row"> 
					<label for="nombre" class="col-sm col-form-label">Nombre</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="nombre_prof" value="{{old('nombre_prof')}}">
						
					</div>

					 
					<label for="ci" class="col-sm-2 col-form-label">CI</label>
					<div class="col-sm-4">
						<input type="ci" class="form-control" name="ci_prof"  id="ci" value="{{old('ci_prof')}}">
					</div>
				</div>
                
				

				<div class = "form-group row"> 
					<label for="apellidoparterno" class="col-sm-2 col-form-label">Apellido Paterno</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="ap_pa_prof" value="{{old('ap_pa_prof')}}">
					</div>

					<label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
					<div class="col-sm-4">
						<input type="telefono" class="form-control" name="telef_prof" id="telefono" value="{{old('telef_prof')}}">
					</div>
				</div>
				

               
				<div class = "form-group row"> 
					<label for="apellidomaterno" class="col-sm-2 col-form-label">Apellido Maternos</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="ap_ma_prof" value="{{old('ap_ma_prof')}}">
					</div>

					 
					<label for="direccion" class="col-sm-2 col-form-label">Direccion</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="direc_prof" value="{{old('direc_prof')}}">
					</div>
				</div>

				<div class = "form-group row"> 
					<label for="email" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-4">
						<input type="email" class="form-control" name="correo_prof" id="correo_prof" value="{{old('correo_prof')}}">
					</div>

					<label for="perfil" class="col-sm-2 col-form-label">Perfil</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="perfil_prof" value="{{old('perfil_prof')}}">
					</div>
				</div>

                
				<div class = "form-group row"> 
					<label for="perfil" class="col-sm-2 col-form-label">Titulo</label>
					<div class="col-sm-4 row-fluid">
						<select class="selectpicker" name="titulo_id" data-show-subtext="true" data-live-search="true">
							@foreach($titulos as $titulo)
				            	<option  value="{{$titulo->id}}">{{$titulo->nombre}}</option>	
							@endforeach	
						</select>

					</div>
				
					
				</div>

				<!--<div class = "form-group row"> 
					<label for="area" class="col-sm-2 col-form-label">Area</label>
					<div class="col-sm-4">
						<select class="selectpicker" name="area" data-show-subtext="true" data-live-search="true">
							@foreach($areas as $area)
				            	<option  value="{{$area->id}}">{{$area->nombre}}</option>	
							@endforeach	
						</select>
					</div>
				</div>

				<div class = "form-group row"> 
					<label for="subarea" class="col-sm-2 col-form-label">Subarea</label>
					<div class="col-sm-4">
						<select class="selectpicker" name="subarea" data-show-subtext="true" data-live-search="true">
							@foreach($subareas as $subarea)
				            	<option  value="{{$subarea->id}}">{{$subarea->nombre}}</option>	
							@endforeach	
						</select>
					</div>
				</div>

	        -->    
				<div class = "form-group row"> 
					<div class="col-sm-2"></div>
					<div class="col-8">
							<button type="submit" class='btn btn-danger'>Cancelar</button>
							<button type="submit" class='btn btn-success'>Registrar</button>
					</div>
					
						
				</div>
			</form>

		</div>
	
	</div>
@endsection


