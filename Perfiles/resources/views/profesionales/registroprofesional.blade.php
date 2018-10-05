@extends('layouts.menu')
@section('titulo','REGISTRAR TUTOR')
@section('contenido')

   <div class="row justify-content-center mt-4">
        <div class="col-6">
            <h1 class="mb-3">Añadir un Nuevo Usuario</h1>
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

				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Agregar</button>
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
		            <tbody id="tableTitulosData"><!--Ingreso un id al tbody-->
		                <tr>
		             		
		                </tr>
		            </tbody>
		        </table>
				

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

		




		 <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar titulo a la lista</h4>
                    </div>
                    <div class="modal-body">
                         <div class="form-group">
                         	<label>Nombre titulo</label>
							<input type="text" class="form-control" id="nombre_titulo" name="nombre_titulo" value="{{old('nombre')}}">

							<label>Descripcion</label>
							<input type="text" class="form-control" id="descripcion" name="nombre_titulo" value="{{old('nombre')}}">
                		</div>
                    </div>
                    <div class="modal-footer">
                        <!--Uso la funcion onclick para llamar a la funcion en javascript-->
                        <button type="button" onclick="agregarProducto()" class="btn btn-default" data-dismiss="modal">Agregar</button>
                    </div>
                </div>

            </div>
        </div>
@endsection

<script type="text/javascript">
	function agregarProducto() {

		var nombre_titulo = $("#nombre_titulo").val();
		var descripcion = $("#descripcion").val();
	    
	    var newtr = '<tr class="item"  data-id="'+nombre_titulo+'">';
	    newtr = newtr + '<td class="iProduct" id="nombre">' + nombre_titulo + '</td>';
	    newtr = newtr + '<td class="iProduct" id="descripcion">' + descripcion + '</td>';
	    newtr = newtr + '<td><button type="button" class="btn btn-danger btn-xs remove-item"><i class="fa fa-times"></i></button></td></tr>';
	    
	    $('#tableTitulosData').append(newtr);	    
	    RefrescaProducto();
	        
	    $('.remove-item').off().click(function(e) {
	        $(this).parent('td').parent('tr').remove();
	        if ($('#tableTitulosData tr.item').length == 0)
	            $('#tableTitulosData .no-item').slideDown(300); 
	        RefrescaProducto();
	    });        
	   $('.iProduct').off().change(function(e) {
	        RefrescaProducto();
	   });
    }

	function RefrescaProducto(){
        var ip = [];

        $('.iProduct').each(function(index, element) {
        	var datos = element;
            ip.push({ 
            	nombre_titulo : element.innerText, 
            	descripcion : element.innerText ,
            });
        });

        var ipt = JSON.stringify(ip);
        $('#ListaTitulos').val(ipt);
    }
</script>