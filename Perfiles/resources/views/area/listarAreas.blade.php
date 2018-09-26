@extends('layouts.menu')
@section('titulo','LISTAR AREAS')
@section('contenido')

<Form method="GET" action="{{route('buscarArea')}}">
  <div class="container"> 
      <div class="form-group row">
              <div class="col-3"></div>
<<<<<<< HEAD
              <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Buscar" id="buscar_area" value="{{old('buscar_area')}}">
              </div> 
              <div class="col-sm-5">
                <button type="submit" class="btn btn-success"> Buscar</button>
=======
              <div class="col-4">
                  <input type="text" class="form-control" placeholder="Buscar"  name="buscar" value="{{old('buscar')}}">
>>>>>>> d987537add4de8029d441940e355f74b421db180
              </div>
              <span class="input-group-btn">
                <button class="btn btn-success"> Buscar</button>
              </span>
      </div>
  </div>

  <div class="table-responsive">
      <table class="tabla" id="listaArea">
          <thead class ="columnas">
        <tr>
          <th style="width: 35px; text-align: center;">N°</th>
          <th style="width: 100px;">Codigo</th>
          <th style="width: 200px;">Nombre</th>
          <th style="width: 500px;">Descripcion</th>
          <th style="width: 90px;"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($areas as $area)
            <tr>
                <td>{{$area->id}}</td>
                <td>{{$area->codigo}}</td>
                <td>{{$area->nombre}}</td>
                <td>{{$area->descripcion}}</td>
                <td>
                    <div class="text-center">
                        <a href='#' data-toggle="tooltip" data-placement="right" title="Editar">
                            <i class="fa fa-pencil-square-o fa-2x" ></i>
                          </a>
                          <a href='#' data-toggle="tooltip" data-placement="right" title="eliminar">
                              <i class="fa fa-minus-square fa-2x" ></i>
                          </a>
                          <a href='#' data-toggle="tooltip" data-placement="right" title="Agregar Subarea">
                                <i class="fa fa-plus fa-2x" aria-hidden="true"  ></i>
                          </a>
                    </div>
                </td>
            </tr>   
        @endforeach
      </tbody>
    </table>
</div>
</Form>
@endsection