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

		/*if($request){
			$buscar = trim($request->get('buscarTexto'));
			$areas = DB::table('area')->where('nombre',' ','descripsion','LIKE','%',$buscar,'%');
			return view('area.listaAreas',["areas"=>$areas],'buscarTexto'=>$buscar);
		}
		*/
		 $data = Area::all();
		return view('area.lista',['areas'=> $data ]);
	}

	public function registrar(){
		return view('area.registrarArea');
	}

	public function guardar(AreaFormRequest $request){
		$area = new Area;
		$area->nombre = $request->get('nombre');
		$area->descripsion = $request->get('descripsion');
		$area->save();
		return Redirect::to('area');
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
}
