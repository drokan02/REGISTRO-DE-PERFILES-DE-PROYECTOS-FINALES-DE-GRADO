@extends('layouts.menu')
@section('titulo','SELECCIONE LA MODALIDAD DE SU PERFIL')
@section('contenido')

<div class="container">
    <form method="POST" action="{{route('modificarPerfil',['fecha_ini'=>$fecha_ini,'fecha_fin'=>$fecha_fin,'perfil'=>$perfil])}}">
            {!! csrf_field() !!}
        <div class="form-group row">
                <div class="col-sm-2"></div>
                <label for="modalidad_id" class="col-sm-2 col-form-label">Modalidad de perfil</label>
                <div class="col-sm-6">
                    <select class="form-control" id="modalidadG" name="modalidad_id">
                        <option>seleccione una opcion</option>
                        @foreach($modalidades as $modalidad)
                             <option value="{{$modalidad->id}}" {{$perfil->modalidad->id == $modalidad->id? 'selected':''}}>{{$modalidad->nombre_mod}}</option>
                        @endforeach
                    </select>
                </div>
        </div>
 <div class="col-sm-12" id="contenidoForm">     
        <div class="col-sm-12" id="contenidoForm">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nombre Estudiante</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="estudiante_id" id="estudiante_id"
                     value="{{$estudiante->nombres}}" disabled>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="carrera_id" class="col-sm-2 col-form-label">Carrera</label>
                <div class="col-4">
                    <input type="text" class="form-control" name="carrera_id" id="carrera_id" 
                    value="{{$estudiante->carrera->nombre_carrera}}" disabled>
                </div>
                <label for="gestion_aprobacion" class="col-sm-2 col-form-label">Gestion de Aprobacion</label>
                <div class="col-4">
                    <input type="text" class="form-control" name="gestion_aprobacion" id="gestion_aprobacion"  value="{{$gestion}}" disabled>
                </div>
            </div>
        
            <div class="form-group row">
                <label for="director" class="col-sm-2 col-form-label">Director de Carrera</label>
                <div class="col-10">
                        <input type="text" class="form-control" name="director" id="director" 
                        value="{{$perfil->director->profesional->ap_pa_prof}} {{$perfil->director->profesional->ap_ma_prof}} {{$perfil->director->profesional->nombre_prof}}" disabled>
                </div>
            </div>
            
            <div class="form-group row">   
                <div class="col-sm-4"></div>
                <label for="trabajo_conjunto" class="col-sm-2 col-form-label">Trabajo Conjunto  &nbsp;
                            <input class="trabajoCon" type="checkbox"  name="trabajo_conjunto" value="no"
                                {{$perfil->trabajo_conjunto == 'si'? 'checked': ''}}>
                </label> 
        
                <div class="col-sm-1"></div>
                <label for="trabajo_conjunto" class="col-sm-2 col-form-label" >Cambio de Tema  &nbsp;
                        <input class="cambioTema" type="checkbox"   name="cambio_tema" value="no" 
                        {{$perfil->cambio_tema == 'si'? 'checked': ''}}>
                </label> 
            </div>
            <div class="form-group row" id="contentPerfiles" style="display:none;">
                <label for="tutor" class="col-sm-2 col-form-label">Perfiles en Conjunto</label>
                <div class="col-10">
                    <select name="titulo_perfil" id="titulo_perfil" class="form-control form-control-chosen" data-perfil="{{$perfiles}}">
                            <option  disabled selected>Seleccionar</option>
                            <option value="">Perfil aun no registrado</option>
                            @foreach ($perfiles as $perfil)
                                <option value="{{$perfil}}">{{$perfil->titulo}}</option>
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Titulo</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="titulo" id="titulo" 
                    value="{{$perfil->titulo}}" >
                </div>
            </div>
        
         @if ($perfil->modalidad->nombre_mod == 'adscripcion')
            <div class="form-group row" >
                    <label for="name" class="col-sm-2 col-form-label">Seccion de trabajo</label>
                    <div class="col-10">
                        <input type="text" class="form-control" name="sec_trabajo" id="sec_trabajo"
                         value="{{$perfil->sec_trabajo}}" disabled>
                     </div>
            </div>  
            @endif
            
            @if ($perfil->modalidad->nombre_mod == 'Trabajo Dirigido')
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Institución Participante</label>
                <div class="col-10">
                    <input type="text" class="form-control" name="institucion" id="institucion" 
                    value="{{$perfil->institucion}}" disabled >
                </div>
            </div>   
            @endif
            
                    
            <div class="form-group row">
                <label for="tutor" class="col-sm-2 col-form-label">Docente de Materia</label>
                <div class="col-10">
                    <select name="docente_id" id="docente_id" class="form-control form-control-chosen">
                            <option disabled selected>Seleccionar</option>
                            @foreach ($docentes as $docente)
                            <option value="{{$docente->id}}" {{$perfil->docente_id == $docente->id? 'selected':''}}>
                                {{$docente->profesional->ap_pa_prof}}&nbsp;
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
                    <select name="tutor_id" id="tutor_id" class="form-control form-control-chosen">
                            <option disabled selected>Seleccionar</option>
                            @foreach ($profesionales as $profesional)
                            <option value="{{$profesional->id}}" {{$perfil->tutor[0]->id == $profesional->id? 'selected':''}} >
                                {{$profesional->ap_pa_prof}}&nbsp;
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
                    <select name="area_id" id="area_id" class="form-control form-control-chosen">
                            <option disabled selected>Seleccionar</option>
                            @foreach ($areas as $area)
                            <option value="{{$area->id}}" {{$perfil->area_id == $area->id? 'selected':''}}>{{$area->nombre}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="tutor" class="col-sm-2 col-form-label">Subarea</label>
                <div class="col-10">
                    <select name="subarea_id" id="subarea_id" class="form-control form-control-chosen">
                            <option disabled selected>Seleccionar</option>
                            @foreach ($subareas as $subarea)
                            <option value="{{$subarea->id}}" {{$perfil->subarea_id == $subarea->id? 'selected':''}}>{{$subarea->nombre}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
        
                
                
            
            <div class = "form-group row">
                <label for="objetivo_gen" class="col-sm-2 col-form-label">Objetivo general</label>
                <div class="col-sm-10">
                    <textarea class="form-control"  autocomplete="off" id="objetivo_gen"
                    name="objetivo_gen" rows="5">{{$perfil->objetivo_gen}}</textarea>
                </div>
            </div>
        
            <div class = "form-group row">
                <label for="objetivo_esp" class="col-sm-2 col-form-label">Objetivos específicos</label>
                <div class="col-sm-10">
                        <textarea class="form-control"  autocomplete="off" id="objetivo_esp" 
                        name="objetivo_esp" rows="5">{{$perfil->objetivo_esp}}</textarea>
                </div>
            </div>
                
            <div class = "form-group row">
                    <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                    <div class="col-sm-10">
                            <textarea class="form-control"  autocomplete="off" id="descripcion"
                            name="descripcion" rows="5">{{$perfil->descripcion}}</textarea>
                    </div>
            </div>
        

            <div class = "form-group row"> 
                <div class="col-sm-2"></div>
                <div class="col-8">
                        <a href="{{ route('Docentes') }}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class='btn btn-success registrarPerfil'>Registrar</button>
                </div>
                
                    
            </div>
            
        </div>
    </div>  
</form>

 </div>
 <script>
        //$('.form-control-chosen').chosen({});
       
 </script>
 <script src={{asset('js/eliminar.js')}}></script>
@endsection