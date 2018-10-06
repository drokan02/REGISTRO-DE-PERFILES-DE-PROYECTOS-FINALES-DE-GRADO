@extends('layouts.menu')
@section('titulo','REGISTRAR TUTOR')
@section('contenido')

   <div class="row justify-content-center mt-4">
        <div class="col-6">
            <h1 class="mb-3">Profesional</h1>
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
						<input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
						
					</div>

					 
					<label for="ci" class="col-sm-2 col-form-label">CI</label>
					<div class="col-sm-4">
						<input type="ci" class="form-control" num="ci" id="ci" value="{{old('ci')}}">
					</div>
				</div>
                
				

				<div class = "form-group row"> 
					<label for="apellidoparterno" class="col-sm-2 col-form-label">Apellido Paterno</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="apellidopaterno" value="{{old('apellidopaterno')}}">
					</div>

					<label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
					<div class="col-sm-4">
						<input type="telefono" class="form-control" name="telefono" id="telefono" value="{{old('telefono')}}">
					</div>
				</div>
				

               
				<div class = "form-group row"> 
					<label for="apellidomaterno" class="col-sm-2 col-form-label">Apellido Maternos</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="apellidomaterno" value="{{old('apellidomaterno')}}">
					</div>

					 
					<label for="direccion" class="col-sm-2 col-form-label">Direccion</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="direccion" value="{{old('direccion')}}">
					</div>
				</div>

                
				<div class = "form-group row"> 
					<label for="perfil" class="col-sm-2 col-form-label">Perfil</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="perfil" value="{{old('perfil')}}">
					</div>
				
					<!--<label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="titulo" value="{{old('titulo')}}">
					</div>-->
				</div>

				<div class = "form-group row"> 
					<label for="cargahoraria" class="col-sm-2 col-form-label">Carga Horaria</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="cargahoraria" value="{{old('cargahoraria')}}">
					</div>
				</div>

				<div class = "form-group row"> 
					<label for="codigosis" class="col-sm-2 col-form-label">CodigoSIS</label>
					<div class="col-sm-4">
						<input type="num" class="form-control" id="codigosis" value="{{old('codigosis')}}">
					</div>
				</div>

	            <div class = "form-group row"> 
					<label for="email" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-6">
						<input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
					</div>
				</div>

			<!--	<button type="button" class="btn btn-info" data-toggle="modal"     data-target="#myModal">Agregar</button>
          			<input type="hidden" id="ListaTitulos" name="ListaTitulos" value="" required />
          			<br>
				 <table id="tableTitulos" class="table">
		            <thead>
		                <tr>
		                    <th>Nombre</th>
		                    <th>Descripcion</th>
		                    <th>Acción</th>
		                </tr>
		            </thead>
		            <tbody id="tableTitulosData">
		             		
		                </tr>
		            </tbody>
		        </table>-->
				

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


