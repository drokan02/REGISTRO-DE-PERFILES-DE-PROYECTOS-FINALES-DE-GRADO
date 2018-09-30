<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaFormRequest;
use App\Area;
class SubareaController extends Controller
{
    public function index(Request $request,Area $area){
		if($request->get('buscar') != null){
			$buscar = $request->get('buscar');		
			$subareas = Area::subareas($area->id,$buscar)->get();
			return view('subarea.listar',['area'=> $area,'subareas'=>$subareas,'buscar'=>$buscar , 'fila'=>1]);	
		}else{
			$subareas =Area::subareas($area->id,' ')->get();
			return view('subarea.listar',['area'=>$area,'subareas'=>$subareas,'buscar'=> null,'fila'=>1]);
		}
	}

	public function registrar(Area $area){
		return view('subarea.registrar',compact('area'));
	}

	
	public function almacenar(AreaFormRequest $request,Area $area){

		$subarea = new Area;
		$subarea->codigo = $request->codigo;
		$subarea->nombre = $request->nombre;
		$subarea->descripcion = $request->descripcion;
		$subarea->id_area = $area->id;
		$subarea->save();
		return redirect()->route('subareas',['area'=>$area]);
	}


	public function editar($id){
		
		$subarea = Area::findOrFail($id);
		$area = Area::findOrFail($subarea->id_area);
		return view('subarea.editar',['area'=>$area,'subarea'=>$subarea]);
	}

	public function modificar(AreaFormRequest $request,$id){
		$subarea = Area::findOrFail($id);
		$area = Area::findOrFail($subarea->id_area);
		$subarea->update($request->all());
        return redirect()->route('subareas',['area'=>$area]);
	}

	public function eliminar($id){
		 Area::findOrFail($id)->delete();
		 return redirect()->route('Areas');
	}
}
