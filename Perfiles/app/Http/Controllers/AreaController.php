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
		$buscar = $request->get('buscar');
		$areas = Area::buscar($buscar)
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
		$subareas = Area::subareas($id,'')->get();
		if($subareas != []){
			return back()->withErrors('No se puede eliminar la Area por que existen SubAreas asociadas a este');
		} else {
			/*Area::findOrFail($id)->delete();
			return redirect()->route('Areas');*/
		}
	}
	
	public function ver($id){
		$area=Area::findOrFail($id);
		$subareas = $area->subareas($id)->get();
		return view('area.ver',['area'=>$area,'subareas'=>$subareas]);
	}
}
