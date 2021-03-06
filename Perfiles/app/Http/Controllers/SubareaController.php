<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaFormRequest;
use App\Area;
class SubareaController extends Controller
{
    function __construct(){
        //$this->middleware('auth');
        //$this->middleware(['verificarCuenta']);
        $this->middleware('permisos:areas');
    }

    public function index(Request $request,Area $area){
		$buscar = $request->get('buscar');
		$fila = 1;
		$subareas = Area::buscarsubareas($area->id,$buscar)
						->orderBy('id','ASC')
						->paginate(20);

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
		$this->agregarCarrera($request['codigo'],$area);
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

		$perfilSubarea = Area::join('perfil','area.id','=','perfil.subarea_id')
			->where('area.id',$id)->distinct()->get();
		
		if(count($perfilSubarea)==0){
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
			
		}else{
			return response()->json([
				'eliminado'=>true,
				'mensaje'=>'La Sub Area no puede eliminarse debido a que esta asociada a un perfil'
			]);
		}
		return redirect()->route('subareas',compact('area'));
		/*
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
		return redirect()->route('subareas',compact('area'));*/
	}

	public function agregarCarrera($codigo,$area){
		$subarea_id = Area::where('codigo',$codigo)->value('id');
		$carreras   = $area->carreras->pluck('id')->toArray();
		if($carreras){
			$area->carreras()->attach($carreras,['area_id'=>$subarea_id]);
		}
	}

}