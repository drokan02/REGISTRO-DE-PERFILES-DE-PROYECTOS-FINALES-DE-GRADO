@extends('layouts.menu')
@section('titulo','TRABAJO DIRIGIDO O ADSCRIPCION')
@section('contenido')

    <form method="POST" action="#">
        {!! csrf_field() !!}
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nombre Estudiante</label>
            <div class="col-9">
                <input type="text" class="form-control" name="name" id="name" value="{{$estudiante->nombres}}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-5">
                <div class="row">
                    <label for="telefono" class="col-sm-5 col-form-label">Telefono</label>
                    <div class="col-7">
                        <input type="number" class="form-control" name="telefono" id="telefono" value="{{$estudiante->telefono}}" disabled>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-8">
                        <input type="email" class="form-control" name="email" id="email" value="{{$estudiante->email}}" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tutor" class="col-sm-2 col-form-label">Tutores</label>
            <div class="col-9">
                <select name="tutor" id="tutor" class="form-control">
                    <option value="">seleccione una opcion</option>
                    @foreach($profesionales as $profesional)
                        <option value="">{{$profesional->nombre_prof}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-5">
                <div class="row">
                    <label for="carrera" class="col-sm-5 col-form-label">Carrera</label>
                    <div class="col-7">
                        <input type="text" class="form-control" name="carrera" id="carrera" value="{{$estudiante->carrera()->first()->nombre_carrera}}" disabled>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="row">
                    <label for="trabajo_conjunto" class="col-sm-3 col-form-label">Trabajo conjunto</label>
                    <div class="col-7">
                        <input type="text" class="form-control" name="trabajo_conjunto" id="trabajo_conjunto" value="{{old('trabajo_conjunto')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-5">
                <div class="row">
                    <label for="ges_apr" class="col-sm-5 col-form-label">Gestion Aprobacion</label>
                    <div class="col-7">
                        <input type="text" class="form-control" name="ges_apr" id="ges_apr" value="{{old('ges_apr')}}">
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="row">
                    <label for="camb_tema" class="col-sm-3 col-form-label">Cambio de tema</label>
                    <div class="col-7">
                        <input type="text" class="form-control" name="camb_tema" id="camb_tema" value="{{old('camb_tema')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
            <div class="col-9">
                <input type="text" class="form-control" name="titulo" id="titulo" value="{{old('titulo')}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-5">
                <div class="row">
                    <label for="area" class="col-sm-5 col-form-label">Area</label>
                    <div class="col-7">
                        <input type="text" class="form-control" name="area" id="area" value="{{$area}}" disabled>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="row">
                    <label for="sub_area" class="col-sm-2 col-form-label">Sub Area</label>
                    <div class="col-8">
                        <select name="sub_area" id="sub_area" class="form-control">
                            <option value="">seleccione una opcion</option>
                            @foreach($subAreas as $subArea)
                                <option value="">{{$subArea->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-5">
                <div class="row">
                    <label for="modalidad" class="col-sm-5 col-form-label">Modalidad</label>
                    <div class="col-7">
                        <input type="text" class="form-control" name="modalidad" id="modalidad" value="{{$modalidad}}" disabled>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="row">
                    <label for="inst_partcipante" class="col-4 col-form-label">Institucion participante</label>
                    <div class="col-6">
                        <input type="text" class="form-control" name="inst_partcipante" id="inst_partcipante" value="{{old('inst_partcipante')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class = "form-group row">
            <label for="objetivo_gnrl" class="col-sm-2 col-form-label">objetivo general</label>
            <div class="col-sm-9">
						<textarea class="form-control"  autocomplete="off" id="objetivo_gnrl"
                                  name="objetivo_gnrl" rows="5">{{old('objetivo_gnrl')}}</textarea>
            </div>
        </div>
        <div class = "form-group row">
            <label for="objetivo_esp" class="col-sm-2 col-form-label">objetivos especificos</label>
            <div class="col-sm-9">
						<textarea class="form-control"  autocomplete="off" id="objetivo_esp"
                                  name="objetivo_esp" rows="5">{{old('objetivo_esp')}}</textarea>
            </div>
        </div>
        <div class = "form-group row">
            <label for="descripcion" class="col-sm-2 col-form-label">descripcion</label>
            <div class="col-sm-9">
						<textarea class="form-control"  autocomplete="off" id="descripcion"
                                  name="descripcion" rows="5">{{old('descripcion')}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <div class="row">
                    <label for="dir_carrera" class="col-sm-6 col-form-label">Director de carrera</label>
                    <div class="col-6">
                        <input type="text" class="form-control" name="dir_carrera" id="dir_carrera" value="{{old('dir_carrera')}}">
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <label for="doc_materia" class="col-sm-4 col-form-label">Docente Materia</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="doc_materia" id="doc_materia" value="{{old('doc_materia')}}">
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="row">
                    <label for="tutors" class="col-sm-3 col-form-label">Tutor</label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="tutors" id="tutors" value="{{old('tutors')}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col">
                <div class="row">
                    <label for="responsable" class="col-sm-4 col-form-label">Responsable</label>
                    <div class="col-6">
                        <input type="text" class="form-control" name="responsable" id="responsable" value="{{old('responsable')}}">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <label for="estudiante" class="col-sm-4 col-form-label">Estudiante</label>
                    <div class="col-6">
                        <input type="text" class="form-control" name="estudiante" id="estudiante" value="{{old('estudiante')}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col offset-5">
                <a href="{{route('seleccionarPerfil')}}" class="btn btn-danger btn-lg">Atras</a>
                <button type="submit" class="btn btn-success btn-lg">Registrar perfil</button>
            </div>
        </div>
    </form>

@endsection