<?php

namespace App\Http\Controllers;

use App\Area;
use App\Docente;
use App\Modal;
use App\Perfil;
use App\Profesional;
use App\Estudiante;
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
                    view('perfiles.formTrabajoD',compact('director','docentes','profesionales','areas','subareas','estudiante','modalidad_id','modalidad'))->render()
                );
            }else{
                return response()->json(
                    view('perfiles.formTesis',compact('director','docentes','profesionales','areas','subareas','estudiante','modalidad_id','modalidad'))->render()
                );
            } 
        }
    }
    
    public function almacenar(PerfilFormRequest $request){
        $perfil = new Perfil;
        $trabConjunto = $request['trabajo'];
        $estudiante_id = $request['estudiante_id'];
        $est_perf = Estudiante::find($estudiante_id)->perfil;
        $perfil_id = Perfil::where('titulo',$request['titulo'])->value('id');
        if($request->ajax()){
            return response()->json($this->verificar($trabConjunto,$perfil_id,$est_perf));
        }
        if($perfil_id && $trabConjunto == 'si'){
            $perfil->estudiantes()->attach($estudiante_id,['perfil_id'=>$perfil_id]); 
        }else{
            $perfil->create($request->all());
            $perfil_id = Perfil::where('titulo',$request['titulo'])->value('id');
            $perfil->estudiantes()->attach($estudiante_id,['perfil_id'=>$perfil_id]); 
        }
        
        
        
        
       // Perfil::create($request->all());
        
    }

     public function verificar($trabConjunto,$id,$est_perf){
         if(!$est_perf){
            if($trabConjunto == 'si'){
                return [
                    'registrado'=>true,
                    'mensaje'=> 'Formulario registrado correctamente'
                ];  
            }else{
                if($id){
                    return [
                        'registrado'=>false,
                        'mensaje'=> 'Ya existe un formulario registrado con ese titulo'
                    ];  
                }else{
                    return [
                        'registrado'=>true,
                        'mensaje'=> 'Formulario registrado correctamente'
                    ];  
                }
            }
        }else{
            return [
                'registrado'=>false,
                'mensaje'=> 'El estudiante ya tiene registrado un formulario de perfil de grado'
            ]; 
        }

     }

}
