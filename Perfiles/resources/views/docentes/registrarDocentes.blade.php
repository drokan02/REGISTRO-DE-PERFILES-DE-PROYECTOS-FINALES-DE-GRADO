@extends('layouts.menu')
@section('titulo','REGISTRO DE DOCENTES UMSS')
@section('contenido')

<!--ERRORES-->
	@include('complementos.error')				
<!--FIN ERRORES-->
	<div class= "contenido" >
	  <form method="POST" class="form-inline"  >
	        {!! csrf_field() !!}
		  <div class = "form-group row">
		      <div class="col-2"></div>
		        <div class = "col-8">
					
		            <div class = "form-group row"> 
				<label for="codigo" class="col-sm-2 col-form-label">Nombre</label>
				  <div class="col-sm-8">
				     <input type="text" class="form-control" placeholder="Nombre Docente" name="nombre" autocomplete="off"
					value="{{old('cASDAodigo')}}">
				   </div>
                                </div>
        <!--apellido paterno -->
	<div class = "form-group row"> 
	  <label for="apellidoP" class="col-sm-2 col-form-label">Apellido Paterno</label>
	     <div class="col-sm-8">
	         <input type="text" class="form-control" placeholder="Apellido Paterno" name="" autocomplete="off"
		       value="{{old('apellidoP')}}">
	      </div>
	</div>
	<!--apellido materno -->	
	<div class = "form-group row">
	    <label for="apellidoM" class="col-sm-2 col-form-label">Apellido Materno</label>
		<div class="col-sm-8">
                     <input type="text" class="form-control" placeholder="apellido materno" name="nombre" autocomplete="off"
                         value="{{old('apellidoM')}}">
		</div>
						
        </div>
        <!--CI -->
	<div class = "form-group row"> 
             <label for="ci" class="col-sm-2 col-form-label">CI</label>
                 <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="CI Docentes" name="nombre" autocomplete="off"
                          value="{{old('CI')}}">
                       </div>
                  </div>
                  <!--CORREO -->
	<div class = "form-group row"> 
                        <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                           <div class="col-sm-8">
                               <input type="text" class="form-control" placeholder="Correo" name="correo" autocomplete="off"
                                     value="{{old('Correo')}}">
                            </div>
                      </div>
                      <!--Cerrera-->
	<div class = "form-group row"> 
                        <label for="carrera" class="col-sm-2 col-form-label">Carrera</label>
                           <div class="col-sm-8">
                               <input type="text" class="form-control" placeholder="Carrera" name="carrera" autocomplete="off"
                                     value="{{old('carrera')}}">
                            </div>
                      </div>
<!--apellido paterno -->
<div class = "form-group row"> 
                <label for="area" class="col-sm-2 col-form-label">Area</label>
                   <div class="col-sm-8">
                       <input type="text" class="form-control" placeholder="Area del Docente" name="area" autocomplete="off"
                             value="{{old('area')}}">
                    </div>
              </div>
  <!--nombre de usuario -->
	<div class = "form-group row"> 
                        <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
                           <div class="col-sm-8">
                               <input type="text" class="form-control" placeholder="Usario" name="nombre" autocomplete="off"
                                     value="{{old('usuario')}}">
                            </div>
                      </div> 
                      <!--Pasword -->
	<div class = "form-group row"> 
                        <label for="apellidoP" class="col-sm-2 col-form-label">Pasword</label>
                           <div class="col-sm-8">
                               <input type="text" class="form-control" placeholder="Apellido Paterno" name="nombre" autocomplete="off"
                                     value="{{old('contraseña')}}">
                            </div>
                      </div>           
	<div class = "form-group row"> 
	    <div class="col-sm-2"></div>
		<div class="col-8">
	         	<a href="" class="btn btn-danger">Cancel</a>	
			    <button type="submit" class='btn btn-success'>Registrar</button>
			</div>
						
							
		</div>
		</div>
	   </div>
	</form>
</div>

@endsection


@section('contenido')
<div class="row mb-3">
        <form method="POST" class="form-inline">
                {{csrf_field()}}
                <table>
                        <tr><td>Nombre:</td><td><input class="form-control" name="nombreDoc" placeholder="Nombre"></td></tr>
                        <tr><td>Apellidos:</td><td><input class="form-control" name="apellidosDoc" placeholder="Apellido"></td></tr>
                        </table>
                        <input type="submit" value="Registrar Docente">
        </form>
    <div class="col-8 offset-1">
    </div>
    <div class="form-group">
        </div>
 @endsection