
    <h2 style="color:red">perfil de grado </h2>
  
          
            <div>
                <label >Nombre Estudiante</label>
                <strong>{{$perfil->estudiantes->pluck('nombres')->implode(' - ')}}</strong><br>
            </div>
            <form >
                    {!! csrf_field() !!}
                    <div class="form-group row">
                        <label>Nombre Estudiante</label>
                        <div class="col-10">
                            <input type="text"  value="{{$perfil->estudiantes->pluck('nombres')->implode(' - ')}}" disabled>
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label >Area</label>
                        <div class="col-4">
                            <input type="text"  value="{{$perfil->area->nombre}}" disabled>
                        </div>
                        <label>SbAreas</label>
                        <div class="col-4">
                            <input type="text" value="{{$perfil->subarea->nombre}}" disabled>
                        </div>
                    </div>
            </form>
            
    </form>
