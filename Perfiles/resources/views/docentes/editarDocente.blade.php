@extends('layouts.menu')
@section('titulo','EDITAR DOCENTE')
@section('contenido')
   <div class="row justify-content-center mt-4">
        <div class="col-sm-7">
            
           @include('complementos.error')
            <form method="POST" action="{{route('modificarDocente',$docente)}}">
                {!! csrf_field() !!}

				
				<div class = "form-group row "> 
					<label for="nombre" class="alinearDer col-sm-2 col-form-label" style="text-align: right;">Nombre</label>
					<div class="col-sm-4">
						<input type="text" id="nombre" class="form-control" name="nombre_prof" value="{{old('nombre_prof',$docente->profesional->nombre_prof)}}">
					</div>
				</div>
								
				<!--Nombre tutor -->
                

				<div class = "form-group row"> 
					<label for="ap_pa" class="alinearDer col-sm-2 col-form-label">Apellido Paterno</label>
					<div class="col-sm-4">
						<input type="text" id="ape_pa" class="form-control" name="ap_pa_prof" value="{{old('ap_pa_prof',$docente->profesional->ap_pa_prof)}}">
					</div>
				</div>
				

               
				<div class = "form-group row"> 
					<label for="ap_ma_prof" class="alinearDer col-sm-2 col-form-label">Apellido Maternos</label>
					<div class="col-sm-4">
						<input type="text" id="ape_ma_prof" class="form-control" name="ap_ma_prof" value="{{old('ap_ma_prof',$docente->profesional->ap_ma_prof)}}">
					</div>
				</div>

				<div class = "form-group row"> 
					<label for="ci_prof" class="alinearDer col-sm-2 col-form-label">CI</label>
					<div class="col-sm-4">
						<input type="text"  class="form-control" name="ci_prof" id="ci_prof" value="{{old('ci_prof',$docente->profesional->ci_prof)}}">
					</div>
				</div>

                <div class = "form-group row"> 
					<label for="telef_prof" class="alinearDer col-sm-2 col-form-label">Telefono</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="telef_prof" id="telef_prof" value="{{old('telef_prof',$docente->profesional->telef_prof)}}">
					</div>

					<label for="correo_prof" class="alinearDer col-sm-2 col-form-label">Correo</label>
					<div class="col-sm-4">
						<input type="email"  class="form-control" name="correo_prof" value="{{old('correo_prof',$docente->profesional->correo_prof)}}">
					</div>
				</div>

				<div class = "form-group row"> 
					
					<label for="codigo_sis" class="alinearDer col-sm-2 col-form-label">Codigo SIS</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="codigo_sis" id="codigo_sis" value="{{old('codigo_sis',$docente->codigo_sis)}}">
					</div>

					<label for="carga_horaria" class="alinearDer col-sm-2 col-form-label">Carga Horaria</label>
					<div class="col-sm-4 row-fluid" >
							<select name="carga_horaria" id="carga_horaria" class="form-control" >
								<option disabled selected > -- seleccione la Carga Horaria -- </option>
									<option value="Tiempo Parcia">Tiempo Parcia</option>	
									<option value="Tiempo Completo" >Tiempo Completo</option>	

							</select>
					</div>
				</div>

				<div class = "form-group row"> 
					<label for="direc_prof" class="alinearDer col-sm-2 col-form-label">Direccion</label>
					<div class="col-sm-4">
						<input type="text" id="direccion" class="form-control" name="direc_prof" id="direc_prof" value="{{old('direc_prof',$docente->profesional->direc_prof)}}">
					</div>

					<label for="titulo_id" class="alinearDer col-sm-2 col-form-label">Titulo</label>
					<div class="col-sm-4 row-fluid" >
						<select name="titulo_id" id="titulo_id" class="form-control" >
							<option disabled selected > -- seleccione una Titulo -- </option>
							@foreach ($titulos as $titulo)
								<option value="{{$titulo->id}}" 
								{{$docente->profesional->titulo->pluck('id')->contains($titulo->id) ? 'selected':''}}>{{$titulo->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>

				
				<div class = "form-group row"> 
					<label for="area_id" class="alinearDer col-sm-2 col-form-label">Area</label>
					<div class="col-sm-4">
						<select name="area_id" id="area_id" class="form-control" >
							<option disabled selected > -- seleccione una Area -- </option>
							@foreach ($areas as $area)
								<option value="{{$area->id}}"
								{{$docente->profesional->areas->pluck('id')->contains($area->id) ? 'selected':''}}>{{$area->nombre}}</option>
							@endforeach
						</select>
					</div>

					<label for="subarea_id" class="alinearDer col-sm-2 col-form-label">Sub Area</label>
					<div class="col-sm-4">
						<select name="subarea_id" id="subarea_id" class="form-control" >
							<option disabled selected > -- seleccione una Sub Area -- </option>
							@foreach ($subareas as $subarea)
								<option value="{{$subarea->id}}"
								{{$docente->profesional->areas->pluck('id')->contains($subarea->id) ? 'selected':''}}>{{$subarea->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>   
				<div class = "form-group row"> 
					<div class="col-sm-2"></div>
					<div class="col-8">
							<a href="{{ route('Docentes') }}" class="btn btn-danger">Cancel</a>
							<button type="submit" class='btn btn-success'>Registrar</button>
					</div>
					
						
				</div>
			</form>

		</div>
	
	</div>
@endsection


