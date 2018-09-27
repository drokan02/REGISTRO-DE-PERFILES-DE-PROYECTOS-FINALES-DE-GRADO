<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaFormRequest;
use Validator;
use App\Area;
use DB;
class AreaController extends Controller
{
	public function __contruct(){
	
	}
	
	public function index(Request $request){
		if($request->get('buscar') != null){
			$buscar = $request->get('buscar');			
			$areas = Area::buscar($buscar)->get();
			return view('area.listarAreas',['areas'=> $areas,'buscar'=>$buscar ]);	
		}else{
			$areas = Area::all();
			return view('area.listar',['areas'=> $areas]);
		}
	}

	public function registrar(){
		return view('area.registrar',['descripcion'=>null]);
	}

	
	public function almacenar(AreaFormRequest $request){

		$area = new Area;
		$area->create($request->all());
		return redirect()->route('Areas');
	}


	public function editar($id){
		$area=Area::findOrFail($id);
		return view('area.editar',['area'=>$area]);
	
	}

	public function modificar(Request $request,$id){
		Area::findOrFail($id)->update($request->all());
        return redirect()->route('Areas');
	}
	public function eliminar($id){
		 Area::findOrFail($id)->delete();
		 return redirect()->route('Areas');
	}

	

}
