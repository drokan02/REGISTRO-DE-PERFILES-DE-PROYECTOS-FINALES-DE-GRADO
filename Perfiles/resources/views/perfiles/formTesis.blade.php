
<form method="POST" action="{{route('almacenarPerfil',['director_id'=>$director->id,'modalidad_id'=>$modalidad_id,'estudiante_id'=>$estudiante->id,'fecha_ini'=>$fecha_ini,'fecha_fin'=>$fecha_fin])}}">
    {!! csrf_field() !!}
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nombre Estudiante</label>
        <div class="col-10">
            <input type="text" class="form-control" name="estudiante_id" id="estudiante_id" value="{{$estudiante->nombres}}" disabled>
        </div>
    </div>

    <div class="form-group row">
        <label for="carrera_id" class="col-sm-2 col-form-label">Carrera</label>
        <div class="col-4">
            <input type="text" class="form-control" name="carrera_id" id="carrera_id" value="{{$estudiante->carrera->pluck('nombre_carrera')[0]}}" disabled>
        </div>
        <label for="gestion_aprobacion" class="col-sm-2 col-form-label">Gestion de Aprobacion</label>
        <div class="col-4">
            <input type="text" class="form-control" name="gestion_aprobacion" id="gestion_aprobacion" value="{{$gestion}}" disabled>
        </div>
    </div>

    <div class="form-group row">   
        <div class="col-sm-4"></div>
        <label for="trabajo_conjunto" class="col-sm-2 col-form-label">Trabajo Conjunto  &nbsp;
                    <input class="trabajoCon" type="checkbox"  name="trabajo_conjunto" value="no">
        </label> 

        <div class="col-sm-1"></div>
        <label for="trabajo_conjunto" class="col-sm-2 col-form-label">Cambio de Tema  &nbsp;
                <input class="cambioTema" type="checkbox"  name="cambio_tema" value="no">
        </label> 
    </div>
    
    
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Titulo</label>
        <div class="col-10">
            <input type="text" class="form-control" name="titulo" id="titulo" value="{{old('trabajo_conjunto')}}" >
        </div>
    </div>

    <div class = "form-group row">
        <label for="objetivo_gen" class="col-sm-2 col-form-label">Objetivo general</label>
        <div class="col-sm-10">
                <textarea class="form-control"  autocomplete="off" id="objetivo_gen"
                                name="objetivo_gen" rows="5">{{old('objetivo_gnrl')}}</textarea>
        </div>
    </div>

    <div class = "form-group row">
        <label for="objetivo_esp" class="col-sm-2 col-form-label">Objetivos específicos</label>
        <div class="col-sm-10">
                <textarea class="form-control"  autocomplete="off" id="objetivo_esp"
                                name="objetivo_esp" rows="5">{{old('objetivo_esp')}}</textarea>
        </div>
    </div>
        
    <div class = "form-group row">
            <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
            <div class="col-sm-10">
                    <textarea class="form-control"  autocomplete="off" id="descripcion"
                                    name="descripcion" rows="5">{{old('descripcion')}}</textarea>
            </div>
    </div>
    
    <div class="form-group row">
            <label for="director" class="col-sm-2 col-form-label">Director de Carrera</label>
            <div class="col-10">
                    <input type="text" class="form-control" name="director" id="director" 
                    value="{{$director->profesional->ap_pa_prof}} {{$director->profesional->ap_ma_prof}} {{$director->profesional->nombre_prof }}" disabled>
            </div>
        </div>
    
        <div class="form-group row">
            <label for="tutor" class="col-sm-2 col-form-label">Docente de Materia</label>
            <div class="col-10">
                <select name="docente_id" id="tutor" class="form-control">
                        <option disabled selected>-- seleccione una opcion --</option>
                        @foreach ($docentes as $docente)
                        <option value="{{$docente->id}}">{{$docente->profesional->ap_pa_prof}}&nbsp;
                                                            {{$docente->profesional->ap_ma_prof}}&nbsp;
                                                            {{$docente->profesional->nombre_prof }}
                        </option>
                        @endforeach
                </select>
            </div>
        </div>
    
        <div class="form-group row">
            <label for="tutor" class="col-sm-2 col-form-label">Tutor</label>
            <div class="col-10">
                <select name="tutor_id" id="tutor_id" class="form-control">
                        <option disabled selected>-- seleccione una opcion --</option>
                        @foreach ($profesionales as $profesional)
                        <option value="{{$profesional->id}}">{{$profesional->ap_pa_prof}}&nbsp;
                                                                {{$profesional->ap_ma_prof}}&nbsp;
                                                                {{$profesional->nombre_prof }}
                        </option>
                        @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-group row">
                <label for="tutor" class="col-sm-2 col-form-label">Area</label>
                <div class="col-10">
                    <select name="area_id" id="area_id" class="form-control">
                            <option disabled selected>-- seleccione una opcion --</option>
                            @foreach ($areas as $area)
                            <option value="{{$area->id}}">{{$area->nombre}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="tutor" class="col-sm-2 col-form-label">Subarea</label>
                <div class="col-10">
                    <select name="subarea_id" id="subarea_id" class="form-control">
                            <option disabled selected>-- seleccione una opcion --</option>
                            @foreach ($subareas as $subarea)
                            <option value="{{$subarea->id}}">{{$subarea->nombre}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
    
    <div class = "form-group row"> 
        <div class="col-sm-2"></div>
        <div class="col-8">
                <a href="{{ route('Docentes') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class='btn btn-success registrar'>Registrar</button>
        </div>
        
            
    </div>
        

</form>
<script src={{asset('js/eliminar.js')}}></script>