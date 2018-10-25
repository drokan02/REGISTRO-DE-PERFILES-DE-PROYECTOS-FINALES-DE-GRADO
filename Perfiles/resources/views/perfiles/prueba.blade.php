
<form action="">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nombre Estudiante</label>
            <div class="col-10">
                <input type="text" class="form-control" name="estudiante_id" id="estudiante_id" value="{{$estudiante->nombres}}" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="carrera_id" class="col-sm-2 col-form-label">Carrera</label>
            <div class="col-4">
                <input type="text" class="form-control" name="carrera_id" id="carrera_id" value="" disabled>
            </div>
            <label for="gestion_aprobacion" class="col-sm-2 col-form-label">Gestion Aprobacion</label>
            <div class="col-4">
                <input type="text" class="form-control" name="gestion_aprobacion" id="gestion_aprobacion" value="{{old('trabajo_conjunto')}}">
            </div>
        </div>

        <div class="form-group row">   
                <div class="col-sm-4"></div>
                <label for="trabajo_conjunto" class="col-sm-2 col-form-label">Trabajo Conjunto  &nbsp;
                        <input type="checkbox"  id="materialChecked2" >
                </label> 
    
                <div class="col-sm-1"></div>
                <label for="trabajo_conjunto" class="col-sm-2 col-form-label">Cambio de Tema  &nbsp;
                        <input type="checkbox"  id="materialChecked2" >
                </label> 
            </div>
    
            <div class="form-group row">
                <label for="tutor" class="col-sm-2 col-form-label">Director de Carrera</label>
                <div class="col-10">
                        <input type="text" class="form-control" name="director_id" id="director_id" 
                        value="{{$director->profesional->ap_pa_prof}} {{$director->profesional->ap_ma_prof}} {{$director->profesional->nombre_prof }}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="tutor" class="col-sm-2 col-form-label">Docente de Materia</label>
                <div class="col-10">
                    <select name="tutor" id="tutor" class="form-control">
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
                    <select name="tutor" id="tutor" class="form-control">
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
                        <select name="tutor" id="tutor" class="form-control">
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
                        <select name="tutor" id="tutor" class="form-control">
                                <option disabled selected>-- seleccione una opcion --</option>
                                @foreach ($subareas as $subarea)
                                <option value="{{$subarea->id}}">{{$subarea->nombre}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Institución Participante</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="institucion" id="institucion" value="{{old('institucion')}}" >
                        </div>
                    </div>
        
                    <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Encargado</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="encargado" id="encargado" value="{{old('institucion')}}" >
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
        
               
    
</form>