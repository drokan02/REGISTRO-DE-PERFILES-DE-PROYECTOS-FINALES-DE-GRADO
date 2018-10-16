<?php

namespace App\Http\Controllers;
use App\Http\Requests\DocenteFormRequest;
//use App\Http\Requests;
use Illuminate\Http\Request;
use App\Docente;
use App\Profesional;
use App\Area;
use App\Titulo;
use Validator;
use DB;


class docenteController extends Controller
{
    function __construct(){
       // $this->middleware('auth');
    }
    public function index(Request $request){
       $buscar = $request->get('buscar');
       $docentes = new Docente;
       $fila = 1;
       if($buscar){
            $docentes=Docente::with('profesional')
                                ->whereHas('profesional', function ($query) use ( $buscar){
                                        $query->where(DB::raw("CONCAT(nombre_prof,' ',ap_pa_prof,' ',ap_ma_prof)"), "LIKE", "%$buscar%");
                                })->orderBy('id','ASC')->paginate(10);	
       } else{
        $docentes=Docente::with('profesional')->has('profesional')->orderBy('id','ASC')->paginate(10);
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

        return view('docentes.registrarDocente',compact('docente','subareas','areas','titulos'));
    }
  

    public function almacenar(DocenteFormRequest $request){
        if($request->ajax()){
            return response()->json([
                'mensaje'=>'Docente registrado correctamente'
            ]);
        }
        $areas = [$request->area_id,$request->subarea_id];
        $profesional = new Profesional;
        $docente = new Docente;
        $profesional->create($request->all());
        $prof_id = Profesional::where('ci_prof',$request['ci_prof'])->value('id');
        $profesional->areas()->attach($areas,['profesional_id'=>$prof_id]);
        $docente->profesional_id = $prof_id;
        $docente->carga_horaria = $request->carga_horaria;
        $docente->codigo_sis = $request->codigo_sis;
        $docente->save();
		    return redirect()->route('Docentes');
    }

    public function editar(Docente $docente){
        $horarios = ['tiempo_parsial'=>"Tiempo Parcial", 'tiempo_total'=>"Tiempo Total"];
        $areas = Area::areas()->get();
        $subareas = Area::subareas()->get();
        $titulos = Titulo::all();
        return view('docentes.editarDocente',compact('docente','subareas','areas','titulos','horarios'));
    }
    public function ver($id){
		$docente=docentes::findOrFail($id);
		
		return view('docentes.ver',['docente'=>$docente]);
    }
   
    public function modificar(DocenteFormRequest $request,Docente $docente){
        if($request->ajax()){
            return response()->json([
                'mensaje'=>'Docente modificado correctamente'
            ]);
        }
        $datosDocente  = $docente->toArray();
        $prof_id = $datosDocente['profesional_id'];
        $areas = [$request->area_id,$request->subarea_id];
        $profesional = Profesional::findOrFail($prof_id);
        $profesional->areas()->sync($areas,['profesional_id'=>$prof_id]);
        $profesional->update($request->all());
        $docente->update($request->all());
        return redirect()->route('Docentes');
    }

    //todos los metos eliminar con el tiempo se tendra que validar con registros de BD
    public function eliminar(Docente $docente){
        $datosDocente  = $docente->toArray();
        $prof_id = $datosDocente['profesional_id'];
        $docente->delete();
        $profesional = Profesional::findOrFail($prof_id);
		$profesional->areas()->detach(); //eliminar datos en tabla intermedia
        $profesional->delete();
        {
            return response()->json([
                'eliminado'=>true,
                'mensaje'=>'El Docente se elimino correctamente'
            ]);
        }
        return redirect()->route('Docentes');
    }

}
