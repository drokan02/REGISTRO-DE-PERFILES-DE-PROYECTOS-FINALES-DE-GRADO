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
		$subarea->area_id = $area->id;
		$subarea->save();
		return redirect()->route('subareas',['area'=>$area]);
	}


	public function editar($id){
		$subarea = Area::findOrFail($id);
		$area = Area::findOrFail($subarea->area_id);
		return view('subarea.editar',['area'=>$area,'subarea'=>$subarea]);
	}

	public function modificar(AreaFormRequest $request,$id){
		if($request->ajax()){
            return response()->json([
                'mensaje'=>'Sub Area modificado correctamente'
            ]);
        }
		$subarea = Area::findOrFail($id);
		$area = Area::findOrFail($subarea->area_id);
		$subarea->update($request->all());
        return redirect()->route('subareas',['area'=>$area]);
	}

	public function eliminar(Request $request,$id){
		//falta condicionar la eliminacion
		$subarea = Area::findOrFail($id);
		$area = Area::findOrFail($subarea->area_id);
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

	public function carreras(Request $request,Area $subarea){
		$fila = 1;
		$nombreArea = $subarea->toArray()['nombre'];
		$subarea_id = $subarea->toArray()['id'];
		$carrera = $request['carrera_id'];
		$carreras = Carrera::all();
		if(!$carrera){
			if ($request->ajax()) {		
				return response()->json([
					"registrado"=> false,
					'mensaje' => 'Seleccione una carrera',
				]);	
			}
		}else{
			$registrado = $this->agregarCarrera($carrera,$subarea);
			if ($request->ajax()) {
				if($registrado){
					$subarea = Area::find($subarea_id);
					return response()->json([
						"registrado"=> true,
						'mensaje' => "Registrado correctamente la carrera en la Subarea $nombreArea",
						'tabla'   => view('parcial.carrerasSubarea',compact('subarea','carreras','fila'))->render()
					]);
				}else{
					return response()->json([
						"registrado"=> false,
						'mensaje' => 'Esa carrera ya se encuentra registrada',
					]);
				}
				
			}
		}
		
		//dd($this->valido($carrera_id,$area));
		return view('area.carrerasArea',compact('area','carreras','fila'));
	}

	public function agregarCarrera($carrera,Area $subarea){
		$subarea_id = $subarea->toArray()['id'];
		$valido = $this->valido($carrera,$subarea);
		if($valido){
			$subarea->carreras()->attach($carrera,['area_id'=>$subarea_id]);
			return true;
		}else{
			return false;
		}

	}

	public function valido($carrera,$subarea){
		$aux = $subarea->carreras->where('id',$carrera);
		$aux = $aux->toArray();
		if($aux){
			return false;//retornamos false por que esta registrado ya esa carrera
		}else{
			return true;//retornamos verdad por q no esta registrado y asi poder registrarlo
		}
			
	}

	public function eliminarCarrera(Request $request,Carrera $carrera){
		$fila = 1;
		//$carrera_id = $datos['carrera_id'];
		$subarea_id = $request['subarea'];
		//dd($area_id);
		
		$carrera->areas()->detach($subarea_id);
		$subarea = Area::find($subarea_id);
		if($request->ajax()){
			return response()->json([
				"eliminado"=>true,
				"mensaje" => "Se elimino el area de la carrera correctamente",
				"tabla"   => view('parcial.carrerasArea',compact('subarea','fila'))->render()
			]);
		}
	}
}
