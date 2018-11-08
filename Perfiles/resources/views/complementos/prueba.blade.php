@extends('layouts.menu')
@section('titulo','Areas de la Carrera :')
@section('contenido')

        <div class="container " id="area" >
                <input type="text">
            <select  id="area_id" class=" form-control form-control-chosen" data-placeholder="Seleccione." >
                    <option ></option>
                    <option value="1">Option One</option>
                    <option value="3">Option Two</option>
                    <option value="2">Option Three</option>
                    <option>Option Four</option>
                    <option>Option Five</option>
                    <option>Option Six</option>
                    <option>Option Seven</option>
                    <option>Option Eight</option>
                  </select>
        </div>

        <script >
                //$('#area_id').trigger("chosen:updated")
                $('.form-control-chosen').chosen();
                res = $('#area_id').val(2).trigger('chosen:updated');
        </script>

      
        <button id="prueba">prueba</button>

@endsection