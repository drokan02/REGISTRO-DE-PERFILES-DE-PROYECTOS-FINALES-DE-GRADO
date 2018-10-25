<?php

namespace App\Http\Controllers;

use App\Area;
use App\Docente;
use App\Modal;
use App\Perfil;
use App\Profesional;
use App\Http\Requests\PerfilFormRequest;
use Validator;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function nuevoFormulario(){
        $modalidades = Modal::all();
        return view('perfiles.formulario',compact('modalidades'));
    }

    public function mostrarForm(Request $request){
        $modalidad_id  = $request->modalidad_id;
        $estudiante    = auth()->user()->estudiante()->first();
        $carrera_id    = $estudiante->carrera_id;
        $modalidad     = Modal::where('id',$modalidad_id)->value('nombre_mod');
        $subareas      = Area::subareasCarrera($carrera_id)->get();
        $areas         = Area::areasCarrera($carrera_id)->get();
        $profesionales = Profesional::porCarrera($carrera_id)->get();
        $docentes      = Docente::with('profesional')->porCarrera($carrera_id)->get();
        $id            = Docente::directorCarrera($carrera_id)->value('id');
        $director      = Docente::with('profesional')->findOrFail($id);
       // $aux = $modalidad->toArray()[0];
       // dd($aux['id']);
        if($request->ajax()){
            if($modalidad == "adscripcion" || $modalidad == "trabajo dirigido"){
                
                return response()->json(
                    view('perfiles.formTrabajoD',compact('director','docentes','profesionales','areas','subareas','estudiante','modalidad_id'))->render()
                );
            }else{
                return response()->json(
                    view('perfiles.formTesis',compact('director','docentes','profesionales','areas','subareas','estudiante','modalidad_id'))->render()
                );
            } 
        }
    }
    
    public function almacenar(PerfilFormRequest $request){
        if($request->ajax()){
            return response()->json([
                'mensaje'=> 'Formulario del Perfil registrado correctamente'
            ]);
        }
        Perfil::create($request->all());
    }

    

}
