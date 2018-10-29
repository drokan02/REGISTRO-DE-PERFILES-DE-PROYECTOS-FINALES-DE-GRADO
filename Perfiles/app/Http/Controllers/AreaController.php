<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaFormRequest;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use App\Area;
use App\Carrera;
use DB;
class AreaController extends Controller
{
    function __construct(){
        //$this->middleware('auth');
    }
	

	public function index(Request $request){
		$buscar = $request->get('buscar');
		$fila = 1;
		$areas = Area::buscarAreas($buscar)
				->orderBy('id','ASC')
				->paginate(5);
		if($request->ajax()){
			return response()->json(
				view('parcial.areas',compact('areas','buscar','fila'))->render()
			);
		}
		return view('area.listar',compact('areas','buscar','fila'));	
		
	}

	public function registrar(){
		return view('area.registrar');
	}

	
	public function almacenar(AreaFormRequest $request){
		if($request->ajax()){
            return response()->json([
                'mensaje'=>'Area registrado correctamente'
            ]);
        }
		$area = new Area;
		$area->create($request->all());
		return redirect()->route('Areas');
	}


	public function editar($id){
		$area=Area::findOrFail($id);
		return view('area.editar',['area'=>$area]);
	
	}

	public function modificar(AreaFormRequest $request,$id){
		if($request->ajax()){
            return response()->json([
                'mensaje'=>'Area modificado correctamente'
            ]);
        }
		Area::findOrFail($id)->update($request->all());
        return redirect()->route('Areas');
	}

	public function eliminar(Request $request,$id){
		$subareas = Area::subareasarea($id)->get();
		if($subareas->toArray()){
			if($request->ajax())
			{
				 return response()->json([
					 'eliminado'=>false,
					 'mensaje'=>'No se puede eliminar la Area por que existen SubAreas asociadas a este'
				 ]);
			 }
			 return back()->withErrors('No se puede eliminar la Area por que existen SubAreas asociadas a este');
		} else { 
			Area::findOrFail($id)->delete();
			if($request->ajax())
			{
				 return response()->json([
					 'eliminado'=>true,
					 'mensaje'=>'Area se elimino correctamente'
				 ]);
			 }
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
		//$archivo = $request->file('archivo');
		//$nombre=$archivo;
		//if($request->ajax()){
		//	 return response()->json([
		//		 "mensaje" => $nombre
		//	 ]);
		//}
        try{
            $archivo = $request->file('importar_area');
            $nombre=$archivo->getClientOriginalName();
            \Storage::disk('archivos')->put($nombre, \File::get($archivo) );
            $ruta  =  storage_path('archivos') ."/". $nombre;
            Excel::selectSheetsByIndex(0)->load($ruta, function ($hoja) {
                $hoja->each(function ($fila) {
                    $codigo=Area::query()->where('codigo',$fila->codigo)->get();
                    $nombre=Area::query()->where('nombre',$fila->nombre)->get();
                    if(count($codigo)==0 && count($nombre)==0){
                        $modalidad = new Area();
                        $modalidad->create([
                            'id' => $fila->id,
                            'codigo' => $fila->codigo,
                            'nombre' => $fila->nombre,
                            'descripcion' => $fila->descripcion,
                            'id_area' => $fila->id_area,
                        ]);
                    }
                });

            });
            \Storage::disk('archivos')->delete($nombre);
            return redirect()->route('Areas');
        }catch (\Exception $exception){
            return back()->withErrors('no se puede importar');
        }

	}

	
	public function carreras(Request $request,Area $area){
		$fila = 1;
		$nombreArea = $area->toArray()['nombre'];
		$area_id = $area->toArray()['id'];
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
			$registrado = $this->agregarCarrera($carrera,$area);
			if ($request->ajax()) {
				if($registrado){
					$area = Area::find($area_id);
					return response()->json([
						"registrado"=> true,
						'mensaje' => "Registrado correctamente la carrera en la Area $nombreArea",
						'tabla'   => view('parcial.carrerasArea',compact('area','carreras','fila'))->render()
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

	public function agregarCarrera($carrera,Area $area){
		$area_id = $area->toArray()['id'];
		$valido = $this->valido($carrera,$area);
		if($valido){
			$area->carreras()->attach($carrera,['area_id'=>$area_id]);
			return true;
		}else{
			return false;
		}

	}

	public function valido($carrera,$area){
		$aux = $area->carreras->where('id',$carrera);
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
		$area_id = $request['area'];
		//dd($area_id);
		
		$carrera->areas()->detach($area_id);
		$area = Area::find($area_id);
		if($request->ajax()){
			return response()->json([
				"eliminado"=>true,
				"mensaje" => "Se elimino el area de la carrera correctamente",
				"tabla"   => view('parcial.carrerasArea',compact('area','fila'))->render()
			]);
		}
	}

}
