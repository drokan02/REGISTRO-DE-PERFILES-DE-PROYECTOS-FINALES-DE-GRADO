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
        $area_id = $request->area_id;
        $subarea_id = $request->subarea_id;
        $profecional = new Profesional;
        $profecional->create($request->all());
        $prof_id = Profesional::all()->last()->value('id');
        $profecional->areas()->attach($area_id,['profesional_id'=>$prof_id]);
        $profecional->areas()->attach($subarea_id,['profesional_id'=>$prof_id]);
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
        $area_id = $request->area_id;
        $subarea_id = $request->subarea_id;
        $profesional = new Profesional;
        $profesional->findOrFail($id)->update($request->all());
        $profesional->areas()->sync();//elimina todos los registro de la tabla relaccion y ingresa uno nuevo
        //$profesional->areas()->attach($subarea_id,['profesional_id'=>$id]);
        
    }

    public function eliminar($id){
        
    }

    public function ver(Profesional $profesional){

    }
    
}