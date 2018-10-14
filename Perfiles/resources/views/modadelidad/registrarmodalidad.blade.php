@extends('layouts.menu')
@section('titulo','REGISTRAR MODALIDAD')
@section('contenido')


 @if($errors ->any())
                <div class="alert-danger">
                    <h3>Se tiene los siguientes errores en el formulario</h3>
                    <div class="alert-danger">
                        <ul>
                            @foreach($errors->all() as $errors)
                                <li>{{$errors}}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            @endif

<div class="row justify-content-center mt-4">
	<div class= "col-sm-9" style="left: 100px;">
		<form method="POST" action="{{route('almacenarModalidad')}}">
		{!! csrf_field() !!}
				<!--Nombre Modalidad -->
				<div class = "form-group row"> 
					<label for="nombre_mod" class="col-sm-2 col-form-label">Nombre</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="nombre_mod" value="{{old('nombre_mod')}}" 
						placeholder="Nombre" autocomplete="off">
					</div>
				</div>

				<div class = "form-group row"> 
					<label for="codigo_mod" class="col-sm-2 col-form-label">Codigo</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name='codigo_mod' id="codigo_mod" value="{{old('codigo_mod')}}" 
						placeholder="Codigo" autocomplete="off">
					</div>
				</div>
	
				<div class = "form-group row">
					<label for="descripsion_mod" class="col-sm-2 col-form-label">Descripsion</label>
					<div class="col-sm-7">
						<textarea class="form-control" placeholder="descripcion" autocomplete="off"
						name="descripsion_mod" rows="5">{{old('descripsion_mod')}}</textarea>
					</div>
					
				</div>

				<div class = "form-group row"> 
					<div class="col-sm-2"></div>
					<div class="col-7">
							<a href="{{route('registrarmodalidad')}}" class="btn btn-danger">Cancelar</a>  
							<button type="submit" class='btn btn-success registrar'>Registrar</button>
					</div>		
				</div>
		</form>
	</div>
</div>
@endsection