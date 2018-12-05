<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfesionalRequest;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Profesional;
use App\Area;
use App\Titulo;
use App\Carrera;
use App\Perfil;
class ProfesionalController extends Controller
{
    function __construct(){
       // $this->middleware('auth');
        //$this->middleware(['verificarCuenta']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
       $buscar = $request->get('buscar');
       $profesionales = Profesional::buscarprofesional($buscar)
                                 ->doesntHave('docente')
                                 ->with('titulo')
                                 ->orderBy('id','ASC')
                                 ->paginate(15);
        if($request->ajax()){
            return response()->json(
                view('parcial.profesionales',['profesionales'=>$profesionales,'buscar'=>$buscar,'fila'=>1])->render()
            );
        }
        return view('profesionales.listarProfesionales',['profesionales'=>$profesionales,'buscar'=>$buscar,'fila'=>1]);
    }

    public function registrar(){
        $areas = Area::areas()->get();
        $subareas = Area::subareas()->get();
        $carreras = Carrera::all();
        $titulos = Titulo::all();
        return view('profesionales.registroprofesional',compact('areas','subareas','carreras','titulos'));
    }

    
    public function almacenar(ProfesionalRequest $request){
        if($request->ajax()){
            return response()->json([
                'mensaje'=>'Profesional registrado correctamente'
            ]);
        }
        $areas = [$request->area_id];
        if($request->subarea_id){
            $areas = [$request->area_id,$request->subarea_id];
        }
        $profesional = new Profesional;
        $profesional->create($request->all());
        $prof_id = Profesional::where('ci_prof',$request['ci_prof'])->value('id');
        $profesional->areas()->attach($areas,['profesional_id'=>$prof_id]);
        return redirect()->route('listarProfesionales');
    }
   
    public function editar($id){
        $profesional = Profesional::findOrFail($id);
        $areas = Area::areas()->get();
        $subareas = Area::subareas()->get();
        $titulos = Titulo::all();
        $carreras = Carrera::all();
        //dd($profesional->toArray());
        return view('profesionales.editarProfesional',compact('profesional','areas','subareas','titulos','carreras'));
    }

    public function modificar(ProfesionalRequest $request,Profesional $profesional){
        if($request->ajax()){
            return response()->json([
                'mensaje'=>'Profesional modificado correctamente'
            ]);
        }
        DB::transaction(function () use($request,$profesional) {
            $areas = [$request->area_id];
            if($request->subarea_id){
                $areas = [$request->area_id,$request->subarea_id];
            }
            $profesional->update($request->all());
            $prof_id = Profesional::query()->where('ci_prof',$request['ci_prof'])->value('id');
            $profesional->areas()->sync($areas,['profesional_id'=>$prof_id]);//elimina todos los registro de la tabla relaccion y ingresa uno nuevo
        });
        return redirect()->route('listarProfesionales');
        
    }

    public function eliminar(Request $request,Profesional $profesional){
        $profesional->areas()->detach(); //eliminar datos en tabla intermedia
        $profesional->delete();
        if($request->ajax()){
            return response()->json([
                'eliminado'=>true,
                'mensaje'=>'Profesional se elimino correctamente'
            ]);
        }
        return redirect()->route('listarProfesionales');
    }

    public function ver(Profesional $profesional){

    }
    
    public function tutoria(Request $request,Profesional $profesional){
        $fila = 1;

        $buscar = $request['buscar'];
        $perfiles = Perfil::with(['estudiantes'])
                            ->perfilesTutor($profesional->id)
                            ->buscar($buscar)
                            ->orderBy('id','DESC')
                            ->paginate(7);
        if($request->ajax()){
            return view('parcial.perfilesTutor',compact('profesional','profesionales','perfiles','fila',"buscar"))->render();      
        }
        return view('profesionales.perfilesTutor',compact('profesional','profesionales','perfiles','fila',"buscar"));
    }

    public function renunciar(Request $request,Profesional $profesional,Perfil $perfil){
       $perfil->tutor()->sync($request['tutor_id'],['perfil'=>$perfil->id]);
        if($request->ajax()){
            return response()->json([
                "datos" =>$this->tutoria($request,$profesional),
                "mensaje" => "El profesional ya no es el tutor del Perfil"
            ]);
        }
    }

    public function tutores(Request $request,Perfil $perfil,Profesional $profesional){
        $carrera_id = $perfil->director->profesional->carrera_id;
        $profesionales = Profesional::deCarrera($carrera_id)->where('id','!=',$profesional->id)->doesntHave('docente')->get();
        $docentes = Profesional::where('carrera_id',$carrera_id)->WhereHas('docente', function ($query){
            $query->whereNull('docente_materia')->whereNull('director_carrera');
        })->get();

        if ($request->ajax()) {
            return response()->json([
                'profesionales'=>$profesionales->toArray(),
                'docentes'=> $docentes->toArray(),
            ]);
        }
    }

}