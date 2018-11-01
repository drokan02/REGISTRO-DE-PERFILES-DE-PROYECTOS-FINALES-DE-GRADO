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
    public function index(Request $request){
        $mod_id   = $request['modalidad'];
        $periodo  = $request['periodo'];
        $anio     = $request['anio'];
        $buscar   = $request['buscar'];//"no hay titulo";
        $fila     = 1;
        $perfiles = Perfil::modalidadP($mod_id)
                          ->anio($anio)
                          ->periodo($periodo)
                          ->buscar($buscar)
                          ->with('tutor')
                          ->orderBy('id','DESC')
                          ->paginate(7);
        //dd($perfiles->toArray());
        if ($request->ajax()) {
            return response()->json([
                view('parcial.perfiles',compact('perfiles','buscar','fila'))->render()
            ]);
        }
        return view('perfiles.listaPerfiles',compact('perfiles','buscar','fila'));
    }

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
        $director      = $this->directorCarrera($carrera_id);
        $perfiles      = Perfil::where('modalidad_id',$modalidad_id)->whereHas('estudiantes')->get();
        $gestion       = $this->periodo();
        $fecha_ini     = $this->fechaIni();
        $fecha_fin     = $this->fechaFin();
        //$res = $this->verificar('si',7,[]);
       // $aux = $modalidad->toArray()[0];
      // dd($res);
        if($request->ajax()){
            $errores = $this->validarDatos($docentes,$profesionales,$areas,$subareas);
            if(!$errores){
                if($modalidad == "adscripcion" || $modalidad == "trabajo dirigido"){ 
                    return response()->json([
                       'valido'=> true, 
                       'datos' => view('perfiles.formTrabajoD',compact('director','docentes','profesionales','perfiles',
                        'areas','subareas','estudiante','modalidad_id','modalidad','gestion','fecha_ini','fecha_fin'))->render()
                    ]);
                }else{return response()->json([
                        'valido'=> true, 
                        'datos' =>  view('perfiles.formTesis',compact('director','docentes','profesionales','perfiles',
                         'areas','subareas','estudiante','modalidad_id','modalidad','gestion','fecha_ini','fecha_fin'))->render()
                    ]);
                } 
            }else{
                return response()->json([
                    'valido'=> false, 
                    'errores' => $errores
                 ]);
            }
            
        }
    }
    public function directorCarrera($carrera_id)
    {
        $id = Docente::directorCarrera($carrera_id)->value('id');
        if($id){
           return Docente::with('profesional')->findOrFail($id);
        }else{
            return [];
        }
           
    }
    public function almacenar(PerfilFormRequest $request){
        $perfil = new Perfil;
        $trabConjunto = $request['trabajo_conjunto'];
        $estudiante_id = $request['estudiante_id'];
        $est_perf = Estudiante::find($estudiante_id)->perfil;
        $est_perf = $est_perf->toArray();
        $perfil_id = Perfil::where('titulo',$request['titulo'])->value('id');
        $validacion = $this->verificar($trabConjunto,$perfil_id,$est_perf);
        if($request->ajax()){
            return response()->json($validacion);
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
        
         if($est_perf == []){
                if($trabConjunto == 'si'){
                    return $this->maximoIntegrantes($id);
                }else if($id){
                        return [
                            'registrado'=>false,
                            'mensaje'=> 'Ya existe un formulario registrado con ese titulo'.$trabConjunto
                        ];  
                }else{
                    return [
                        'registrado'=>true,
                        'mensaje'=> 'Formulario registrado correctamente'
                    ];  
                }
        }else{
            return [
                'registrado'=>false,
                'mensaje'=> 'Usted ya tiene registrado un Formulario de Perfil '
            ]; 
        }

     }

    public function maximoIntegrantes($id){
        $nro_integrantes = $this->nroIntegrantes($id);
        if ($nro_integrantes < 2) {
            return [
                'registrado'=>true,
                'mensaje'=> 'Formulario registrado correctamente'
            ];  
        }else{
            return [
                'registrado'=>false,
                'mensaje'=> 'Titulo del Perfil ya se encuentra registrado y  cuenta con  el maximo de integrantes que es 2'
            ];
        }
    }
     public function fechaFin(){
        $dia = date('d');
        $mes = date('m');
        $anio= date('Y')+2;
        $fecha_fin = "$anio-$mes-$dia";
        return  $fecha_fin;
     }

     public function fechaIni(){
        $dt = new \DateTime();
        $fecha_ini = $dt->format('Y-m-d');
        return $fecha_ini;
     }
     public function periodo(){
         $mes = date('m');
         $anio = date('Y');
        return ($mes < 7 ? 1 : 2 ).'/'.$anio;
     }

     public function nroIntegrantes($id){
         if($id){
             $res = Perfil::find($id)->estudiantes;
             return $res->count();
         }else{
             return 0;
         }
     }

     
     public function validarDatos($docentes,$profesionales,$areas,$subareas){
         $countD   = $docentes->count();
         $countP   = $profesionales->count();
         $countA   = $areas->count();
         $countS = $subareas->count();
         $errores = array();
         if ($countD == 0 ) {
             $errores['docentes'] ='no puede registrar su perfil  por q no existe registros de los Docentes en la Carrera';
         }
         if ($countP == 0 ) {
            $errores['tutores'] = 'no puede registrar su perfil  por q no no existe registros de los Tutores en la Carrera';
        }
        if ($countA == 0 ) {
            $errores['areas'] = 'no puede registrar su perfil  por q no existe registros de las Areas en la Carrera';
        }
        if ($countS == 0 ) {
            $errores['subareas'] = 'no puede registrar su perfil  por q no existe registros de las Subaras en la Carrera';
        }

        return $errores;
     }
}