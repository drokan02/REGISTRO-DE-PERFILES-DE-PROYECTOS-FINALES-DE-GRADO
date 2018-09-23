<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
			return view('area.listarAreas',['areas'=> $areas]);
		}
	}

	public function registrar(){
		return view('area.registrarArea');
	}

	public function guardar(AreaFormRequest $request){
		$area = new Area;
		$area->nombre = $request->get('nombre');
		$area->descripsion = $request->get('descripsion');
		$area->save();
		return Redirect::to('area.listarAreas');
	}

	public function editar($id){
		$area=Areas::findOrFail($id);
		return view('area.editar',['area'=>$area]);
	
	}

	public function actualizar(Request $request,$id){
		Area::findOrFail($id)->update($request->all());
        return redirect('area');
	}
	public function eliminar(){
		 Area::findOrFail($id)->delete();
        return redirect('area');
	}

	public function buscar(Request $request){
		dd('dasd');
	}

	public function prueba(Request $request){
			$buscar = $request->get('buscar');			
			$areas = Area::buscar($buscar)
			->orderBy('id','DESC');
			return view('area.listarAreas',['areas'=> $areas,'buscar'=>$buscar ]);
	}
}
