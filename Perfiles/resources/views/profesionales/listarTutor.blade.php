@extends('layouts.menu')
@section('titulo','LISTAR TUTOR')
@section('contenido')

<Form>
  <div class="container"> 
      <div class="form-group row">
              <div class="col-3"></div>
              <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Buscar" id="buscar_profesionales" value="{{old('buscar_profesionales')}}">
              </div>
              <div class="col-sm-5">
                <button type="submit" class="btn btn-success"> Buscar</button>
              </div>
      </div>
  </div>
  
  
    <div class="table-responsive">
            <table class="tabla" id="listaPrefesion">
                <thead class ="columnas">
              <tr>
                <th style="width: 35px; text-align: center;">N°</th>
                <th style="width: 200px;">Nombre</th>
                <th style="width: 500px;">Descripcion</th>
                <th style="width: 90px;"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="text-align: right;" >1</td>
                <td>Marcos</td>
                <td>Otto</td>
                <td>
                  <div>
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
              
            </tbody>
          </table>
  </div>
  
</Form>

<!---->
@endsection