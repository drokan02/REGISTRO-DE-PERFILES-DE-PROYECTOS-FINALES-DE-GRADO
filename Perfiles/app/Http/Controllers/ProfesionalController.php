<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfesionalRequest;
use Validator;
use App\Profesional;
use App\Area;
use App\Titulo;
use DB;
class ProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
       $buscar = $request->get('buscar');
       $profesionales = Profesional::buscarprofesional($buscar)
                                 ->orderBy('id','ASC')
                                 ->paginate(10);
       
        return view('profesionales.listarProfesionales',['profesionales'=>$profesionales,'buscar'=>$buscar,'fila'=>1]);
    }

    public function registrar(){
        
        $areas = Area::areas()->get();
        $subareas = Area::subareas()->get();
        $titulos = Titulo::all();

        return view('profesionales.registroprofesional',['areas'=>$areas, 'subareas'=>$subareas, 'titulos'=>$titulos ]);
    }

    
    public function almacenar(ProfesionalRequest $request){
        $areas = [$request->area_id,$request->subarea_id];
        $profesional = new Profesional;
        $profesional->create($request->all());
        $prof_id = Profesional::where('ci_prof',$request['ci_prof'])->value('id');
        $profesional->areas()->attach($areas,['profesional_id'=>$prof_id]);
    }
   
    public function editar($id){
        $profesional = Profesional::findOrFail($id);
        $areas = Area::areas()->get();
        $subareas = Area::subareas()->get();
        $titulos = Titulo::all();
        //dd($profesional->toArray());
        return view('profesionales.editarProfesional',compact('profesional','areas','subareas','titulos'));
    }

    public function modificar(ProfesionalRequest $request,$id){
        $areas = [$request->area_id,$request->subarea_id];
        $profesional = new Profesional;
        $profesional->findOrFail($id)->update($request->all());
        $prof_id = Profesional::where('ci_prof',$request['ci_prof'])->value('id');
        $profesional->areas()->sync($areas,['profesional_id'=>$prof_id]);//elimina todos los registro de la tabla relaccion y ingresa uno nuevo
        //$profesional->areas()->attach($subarea_id,['profesional_id'=>$id]);
        
    }

    public function eliminar(Profesional $profesional){
        $profesional->areas()->detach(); //eliminar datos en tabla intermedia
        $profesional->delete();
        return redirect()->route('listarProfesionales');
    }

    public function ver(Profesional $profesional){

    }
    
}