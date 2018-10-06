<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
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
    public function index(){
        $profesionales = Tutor::all();
    
        return view('profesionales/ListarProfesionales',compact('profesionales'));
    }

    public function create(){
        
       $areas = Area::areas()->get();
        $subareas = Area::subareas()->get();
        $titulos = Titulo::all();
        return view('profesionales/registroprofesional',['areas'=>$areas, 'subareas'=>$subareas, 'titulos'=>$titulos ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        dd($request->all());
        //Tutor::create($request->all());
        //return redirect()->route('listarProfesional');
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $this->validate(request(), [
            'ci_prof' => ['required'],
            'nombre_prof' => ['required'],
            'ap_pa_prof' => ['required'],
            'ap_ma_prof' => ['required'],
            'correo_prof' => ['required','correo_prof','unique:profesionales,correo_prof'],
            'telef_prof' => ['required'],
            'titulo_id' => 'required',
            'direc_prof' => ['required'],
            'perfil_prof' => ['required'],

            'roles'=>'required'
        ]);
       
    }
    
}