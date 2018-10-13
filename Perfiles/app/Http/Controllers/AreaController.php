<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaFormRequest;
use Validator;
use App\Area;
use DB;
class AreaController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
	

	public function index(Request $request){
		$buscar = $request->get('buscar');
		$areas = Area::buscarAreas($buscar)
				->orderBy('id','ASC')
				->paginate(5);
		return view('area.listar',['areas'=> $areas,'buscar'=>$buscar , 'fila'=>1]);	
		
	}

	public function registrar(){
		return view('area.registrar');
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

	public function modificar(AreaFormRequest $request,$id){
		Area::findOrFail($id)->update($request->all());
        return redirect()->route('Areas');
	}

	public function eliminar($id){
		$subareas = Area::subareasarea($id)->get();
		if($subareas->toArray()){
			return back()->withErrors('No se puede eliminar la Area por que existen SubAreas asociadas a este');
		} else { 
			Area::findOrFail($id)->delete();
			return redirect()->route('Areas');
		}
	}
	
	public function ver($id){
		$area=Area::findOrFail($id);
		$subareas = $area->subareasarea($id)->get();
		return view('area.ver',['area'=>$area,'subareas'=>$subareas]);
	}

	//metodo para mostras interfaz para subir archivo excel
	public function subirExcel(){
		return view('area.importar');
	}

	//metodo para importar los datos de excel a la base de datos
	public function importar(Request $request){
		$archivo = $request->file('archivo');
		$nombre=$archivo;
		if($request->ajax()){
			 return response()->json([
				 "mensaje" => $nombre
			 ]);
		}
	}
}
