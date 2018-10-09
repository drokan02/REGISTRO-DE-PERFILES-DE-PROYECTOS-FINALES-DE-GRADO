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
       $buscar = $request->$buscar;
        $profesionales = Profesional::all()//Profesional::buscarProfesional($buscar)
;
        return view('profesionales.listarProfesionales',compact('profesionales'));
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
    }
   
    
    
}