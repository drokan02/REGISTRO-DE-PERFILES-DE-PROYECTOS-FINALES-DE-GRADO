<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaFormRequest;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use App\Area;
use App\Carrera;
use DB;
class AreaController extends Controller
{
    function __construct(){
        //$this->middleware('auth');
        //$this->middleware(['verificarCuenta']);
        $this->middleware('permisos:areas',['except'=>['index','ver']]);
    }
	

	public function index(Request $request){
		$buscar = $request->get('buscar');
		$fila = 1;
		$areas = Area::buscarAreas($buscar)
				->orderBy('id','ASC')
				->paginate(20);
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
		$areaperfil = Area::join('perfil','area.id','=','perfil.area_id')
		 ->where('area.id',$id)->distinct()->get();
	
		$areaCarrera = Area::join('area_carrera','area.id','=','area_carrera.area_id')
		->where('area.id',$id)->distinct()->get();
		$profesionalArea = Area::join('profesional_area','area.id','=','profesional_area.area_id')
		->where('area.id',$id)->distinct()->get();


		$subareas = Area::subareasarea($id)->get();
		if($subareas->toArray()||count($areaperfil)>0 || count($areaCarrera)>0 || count($profesionalArea)>0){
			if($request->ajax())
			{
				 return response()->json([
					 'eliminado'=>false,
					 'mensaje'=>'Esta área no puede ser eliminada, por que esta asociada a otra informacion'
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
		
		/*$subareas = Area::subareasarea($id)->get();
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
			return redirect()->route('Areas');*/
		}
	}
	
	public function ver($id){
		$area=Area::findOrFail($id);
		$subareas = $area->subareasarea($id)->get();
		return view('area.ver',['area'=>$area,'subareas'=>$subareas]);
	}

	//metodo para mostras interfaz para subir archivo excel
	public function subirExcel(){
	    $area=Area::all()->pluck('id')->last();
	    if(!$area){
	        $area=1;
        }
		return view('area.importar', compact('area'));
	}

	//metodo para importar los datos de excel a la base de datos
	public function importar(Request $request){
        $this->validate(request(), [
            'importar_area' => ['required'],
        ]);
        $archivo = $request->file('importar_area');
        $nombre=$archivo->getClientOriginalName();
        $extension=$archivo->getClientOriginalExtension();
        if(!in_array($extension,['xls','xlsx','xlsm','xlsb'])){
            return back()->withErrors('el archivo que intenta 
                subir no es un archivo excel: xls, xlsx, xlsm, xlsb');
        }
        try{
            Storage::disk('archivos')->put($nombre, \File::get($archivo) );
            $ruta  =  storage_path('archivos') ."/". $nombre;
            Excel::selectSheetsByIndex(0)->load($ruta, function ($hoja) {
                $hoja->each(function ($fila) {
                    $codigo=Area::query()->where('codigo',$fila->codigo)->get();
                    $nombre=Area::query()->where('nombre',$fila->nombre)->get();
                    if(count($codigo)==0 && count($nombre)==0){
                        $area = new Area();
                        $area->create([
                            'id' => $fila->id,
                            'codigo' => $fila->codigo,
                            'nombre' => $fila->nombre,
                            'descripcion' => $fila->descripcion,
                            'area_id' => $fila->area_id,
                        ]);
                    }
                });

            });
            Storage::disk('archivos')->delete($nombre);
            return redirect()->route('Areas')->with('exportar','La exportacion fue exitosa');
        }catch (\Exception $exception){
            Storage::disk('archivos')->delete($nombre);
            return back()->withErrors('no se puede importar');
        }

	}
}