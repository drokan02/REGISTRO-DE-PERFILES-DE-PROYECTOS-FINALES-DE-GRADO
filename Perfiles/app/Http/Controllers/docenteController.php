<?php

namespace App\Http\Controllers;
use App\Http\Requests\DocenteFormRequest;
//use App\Http\Requests;
use App\Permiso;
use App\Role;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Docente;
use App\Profesional;
use App\Area;
use App\Titulo;
use App\Carrera;
use App\CargaHoraria;
use Illuminate\Support\Facades\DB;
use Validator;
//use DB;


class docenteController extends Controller
{
    function __construct(){
       // $this->middleware('auth');
        //$this->middleware(['verificarCuenta']);
    }
    public function index(Request $request){
       $carrera_id=0;//falta pasar como atributo
       $buscar = $request->get('buscar');
       $docentes = new Docente;
       $fila = 1;
       if($buscar){
            $docentes=Docente::with('profesional.titulo')//arreglar
                                ->porCarrera($carrera_id)
                                ->buscardocentes($buscar)
                                ->orderBy('id','ASC')
                                ->paginate(10);	
       } else{
        $docentes=Docente::with('profesional.titulo')->porCarrera($carrera_id)
                                              ->orderBy('id','ASC')
                                              ->paginate(10);
       }
      if($request->ajax()){
        return response()->json(
            view('parcial.docentes',compact('docentes','buscar','fila'))->render()
        );
        }
	   	return view('docentes.listadoDocentes',compact('docentes','buscar','fila'));
    }

    public function registrar(){
        $areas = Area::areas()->get();
        $subareas = Area::subareas()->get();
        $titulos = Titulo::all();
        $carreras = Carrera::all();
        $horarios = CargaHoraria::all();
        return view('docentes.registrarDocente',compact('docente','subareas','areas','titulos','carreras','horarios'));
    }
  

    public function almacenar(DocenteFormRequest $request){
        if($request->ajax()){
            return response()->json([
                'mensaje'=>'Docente registrado correctamente'
            ]);
        }
       // dd($request['correo_prof']);
        DB::transaction(function () use($request) {
            $areas = [$request->area_id];
            if($request->subarea_id){
                $areas = [$request->area_id,$request->subarea_id];
            }
            $profesional = new Profesional;
            $docente = new Docente;
            $profesional->create($request->all());
            $prof_id = Profesional::where('ci_prof',$request['ci_prof'])->value('id');
            $profesional->areas()->attach($areas,['profesional_id'=>$prof_id]);
            $docente->profesional_id = $prof_id;
            $docente->cargahoraria_id = $request->cargahoraria_id;
            $docente->codigo_sis = $request->codigo_sis;
            $docente->director_carrera = $request->director_carrera;
            $docente->docente_materia = $request->docente_materia;
            $docente->save();
            $name=$request['nombre_prof'].' '.$request['ap_pa_prof'].' '.$request['ap_ma_prof'];
            $user =new User();
            $user->create([
                'name' => $name,
                'user_name' => $name,
                'email' => $request->correo_prof,
                'password' => bcrypt($request->password),
               // 'confirmation_code' => $data['confirmation_code']
            ]);
            $permisos=[];
            $i=0;
            $role_id=Role::query()->where('nombre_rol','docente')->value('id');
            $iduser=User::query()->where('email',$request->correo_prof)->value('id');
            $idDocente=$docente->id;
            $roles=Role::findOrFail($role_id);
            $aux=$roles->permisos()->pluck('name');
            foreach ($aux as $a) {
                $per=Permiso::query()->where('name',$a)->get()->first();
                $per=$per->id;
                $permisos=array_add($permisos,$i,$per);
                $i=$i+1;
            }
            $user->roles()->attach($role_id,['user_id'=>$iduser]);
            $user->docente()->attach($idDocente,['user_id'=>$iduser]);
            $user->permisosUser()->attach($permisos,['user_id'=>$iduser]);
        });

		return redirect()->route('Docentes');
    }

    public function editar(Docente $docente){
        $horarios = ['tiempo_parsial'=>"Tiempo Parcial", 'tiempo_total'=>"Tiempo Total"];
        $areas = Area::areas()->get();
        $subareas = Area::subareas()->get();
        $titulos = Titulo::all();
        $carreras = Carrera::all();
        $horarios = CargaHoraria::all();
        return view('docentes.editarDocente',compact('docente','subareas','areas','titulos','horarios','carreras','horarios'));
    }
    public function ver(Docente $docente){
		$profesional=$docente->profesional()->first();
		return view('docentes/ver',compact('docente','profesional'));
    }
   
    public function modificar(DocenteFormRequest $request,Docente $docente){
        if($request->ajax()){
            return response()->json([
                'mensaje'=>'Docente modificado correctamente'
            ]);
        }
        $datosDocente  = $docente->toArray();
        $prof_id = $datosDocente['profesional_id'];
        $areas = [$request->area_id];
        if($request->subarea_id){
            $areas = [$request->area_id,$request->subarea_id];
        }
        $profesional = Profesional::findOrFail($prof_id);
        $profesional->areas()->sync($areas,['profesional_id'=>$prof_id]);
        $profesional->update($request->all());
        $docente->update($request->all());
        if(!$request['director_carrera']){
           
            $docente->update([
                'director_carrera'=>null
            ]
            );
        }
        if(!$request['docente_materia']){
            $docente->update([
                'docente_materia'=>null
            ]
            );
        }
        return redirect()->route('Docentes');
    }

    //todos los metos eliminar con el tiempo se tendra que validar con registros de BD
    public function eliminar(Request $request,Docente $docente){
        $datosDocente  = $docente->toArray();
        $prof_id = $datosDocente['profesional_id'];
        $docente->usuario()->delete();
        $docente->usuario()->detach();//eliminar datos en tabla intermedia
        $docente->delete();
        $profesional = Profesional::findOrFail($prof_id);
		$profesional->areas()->detach(); //eliminar datos en tabla intermedia
        $profesional->delete();
        if($request->ajax()){
            return response()->json([
                'eliminado'=>true,
                'mensaje'=>'El Docente se elimino correctamente'
            ]);
        }
        return redirect()->route('Docentes');
    }

    public function cambiarContraseña(Docente $docente){
        return view('docentes/cambiarPassword',compact('docente'));
    }

    public function guardarContraseña(Request $request, Docente $docente){
        $this->validate(request(), [
            'password' => ['required','confirmed','min:6'],
        ]);
        $request['password']=bcrypt($request['password']);
        DB::transaction(function () use($request,$docente) {
            $docente->usuario()->update([
                'password'=>$request['password']
            ]);
        });
        $profesional=$docente->profesional()->first();
        return view('docentes/ver',compact('docente','profesional'));
    }
    public function tutoria(Docente $docente){
        $perfiles=$docente->perfiles()->get();
        return view('docentes/tutoria',compact('docente','perfiles'));
    }

    public function descargarPdf(Docente $docente){
        $perfiles=$docente->perfiles()->get();
        $pdf=PDF::loadView('pdf/tutoriaDocente',compact('perfiles','docente'));
        return  $pdf->download();
    }
}
