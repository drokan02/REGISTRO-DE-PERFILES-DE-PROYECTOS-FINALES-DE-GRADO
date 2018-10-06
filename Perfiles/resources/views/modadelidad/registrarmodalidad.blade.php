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

<form method="POST" action="{{route('almacenarModalidad')}}">
{!! csrf_field() !!}
	<div class= "container" >
		<div class = "form-group row">
			<div class="col-2"></div>
			<div class ="col-8">
				
				<!--Nombre Modalidad -->
				<div class = "form-group row"> 
					<label for="nombre_mod" class="col-sm-2 col-form-label">Nombre</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nombre_mod" value="{{old('nombre_mod')}}">
					</div>
				</div>

				<div class = "form-group row"> 
					<label for="codigo_mod" class="col-sm-2 col-form-label">Codigo</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name='codigo_mod' id="codigo_mod" value="{{old('codigo_mod')}}">
					</div>
				</div>
	
				<div class = "form-group row">
					<label for="descripsion_mod" class="col-sm-2 col-form-label">Descripsion</label>
					<div class="col-sm-8">
					<input type="text" class="form-control" name="descripsion_mod" value="{{old('descripsion_mod')}}">
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