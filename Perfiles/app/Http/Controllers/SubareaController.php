<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaFormRequest;
use App\Area;
class SubareaController extends Controller
{
    function __construct(){
        //$this->middleware('auth');
    }

    public function index(Request $request,Area $area){
		$buscar = $request->get('buscar');
		$fila = 1;
		$subareas = Area::buscarsubareas($area->id,$buscar)
						->orderBy('id','ASC')
						->paginate(5);

		if($request->ajax()){
			return response()->json(
				view('parcial.subareas',compact('area', 'subareas','buscar','fila'))->render()
			);
		}
		return view('subarea.listar',compact('area', 'subareas','buscar','fila'));	
	}

	public function registrar(Area $area){
		return view('subarea.registrar',compact('area'));
	}

	
	public function almacenar(AreaFormRequest $request,Area $area){
		if($request->ajax()){
            return response()->json([
                'mensaje'=>'Sub Area registrado correctamente'
            ]);
        }
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
		if($request->ajax()){
            return response()->json([
                'mensaje'=>'Sub Area modificado correctamente'
            ]);
        }
		$subarea = Area::findOrFail($id);
		$area = Area::findOrFail($subarea->id_area);
		$subarea->update($request->all());
        return redirect()->route('subareas',['area'=>$area]);
	}

	public function eliminar($id){
		//falta condicionar la eliminacion
		$subarea = Area::findOrFail($id);
		$area = Area::findOrFail($subarea->id_area);
		$subarea->delete();
		if($request->ajax())
			{
				 return response()->json([
					 'eliminado'=>true,
					 'mensaje'=>'Sub Area se elimino correctamente'
				 ]);
			 }
		return redirect()->route('subareas',compact('area'));
	}
}
