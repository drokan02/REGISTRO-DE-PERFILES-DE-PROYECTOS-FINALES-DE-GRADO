<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\moddal;
use Illuminate\Validation\Rule;
//use Validator;
use App\Modal;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\fechas;

//use DB;

class modalidades extends Controller
{
    function __construct(){
       // $this->middleware('auth');
        //$this->middleware(['verificarCuenta']);
        $this->middleware('permisos:modalidades',['except'=>['index','ver']]);
    }
	
	
	public function index(Request $request){
		//$buscar = $request->get('buscar');
		//if($buscar != null){			
		//	$modalidad = Modal::buscar($buscar)->get();
		//	return view('modadelidad.listaModalidad',['modalidad'=> $modalidad,'buscar'=>$buscar , 'fila'=>1]);	
		//}else{
		//	$modalidad = Modal::buscar('')->get();
		//	return view('modadelidad.listaModalidad',['modalidad'=> $modalidad,'buscar'=>null,'fila'=>1]);
		//}
		$modalidades=Modal::all();
		if($request->ajax()){
			return response()->json(
				view('parcial.modalidades',compact('modalidades'))->render()
			);
		}
		return view('modadelidad/listaModalidad',compact('modalidades'));
	}
	  
	public function registrar(Request $request){
		
        return view('modadelidad.registrarmodalidad');
    }
	
	public function almacenar(Request $request){
		$this->validate(request(), [
			'nombre_mod'=>['required','regex:/^[\pL\s]+$/u','unique:modalidad,nombre_mod'],
			'codigo_mod' => ['required','alpha_num','unique:modalidad,codigo_mod'],
            'descripcion_mod'=> ['required']
		]);
		if($request->ajax()){
            return response()->json([
                'mensaje'=>'Modalidad registrado correctamente'
            ]);
    
        }
        $request['nombre_mod']=strtolower($request['nombre_mod']);
		$modadelidad = new Modal;

		$modadelidad->create($request->all());
		return redirect()->route('modalidad');
	}

    /**
     * Show the form for editing the specified resource.
     * @param Modal $modalidad
     * @return \Illuminate\Http\Response
     * @internal param Modal $user
     */
    public function editar(Modal $modalidad){
      return view('modadelidad/editarmodal',compact('modalidad'));
	}
	

	public function modificar(Request $request,Modal $modalidad){
        $this->validate(request(), [
            'codigo_mod' => ['required','alpha_num',Rule::unique('modalidad')->ignore($modalidad->id)],
            'nombre_mod'=>['required','regex:/^[\pL\s]+$/u',Rule::unique('modalidad')->ignore($modalidad->id)],
            'descripcion_mod'=> ['required']
		]);
		if($request->ajax()){
            return response()->json([
                'mensaje'=>'Modalidad registrado correctamente'
            ]);
        }
        $request['nombre_mod']=strtolower($request['nombre_mod']);
		$modalidad->update($request->all());
        return redirect()->route('modalidad');
	}

	
	
	public function ver($id){
		$modadelidad=Modal::findOrFail($id);
		return view('modadelidad/ver',compact('id','modadelidad'));
	}

    /**
     * Remove the specified resource from storage.
     * @param Modal $modalidad
     * @return \Illuminate\Http\Response
     * @internal param Modal $user
     */
    public function eliminar(Request $request, Modal $modalidad){
        $modalidades = Modal::join('perfil','modalidad.id','=','perfil.modalidad_id')
            ->where('modalidad.id',$modalidad->id)->distinct()->get();
        if(count($modalidades)==0){
            $modalidad->delete();
            if($request->ajax())
                {
                     return response()->json([
                         'eliminado'=>true,
                         'mensaje'=>'La Modalidad se elimino correctamente'
                     ]);
                 }  
        }else{
            return response()->json([
                'eliminado'=>false,
                'mensaje'=>'La Modalidad no puede eliminarse, debido a que fue registrada en algún perfil'
            ]);
        }
                   //eliminar datos en tabla intermedia
        return redirect()->route('modalidad');

		/*$modalidad->delete();
		if($request->ajax())
			{
				 return response()->json([
					 'eliminado'=>true,
					 'mensaje'=>'La Modalidad se elimino correctamente'
				 ]);
			 }             //eliminar datos en tabla intermedia
        return redirect()->route('modalidad');*/
    }
    public function importar(){
        return view('modadelidad/importarModalidades');
    }

    public function importacion(Request $request){
        $this->validate(request(), [
            'importar_modalidad' => ['required'],
        ]);
        try{
            $archivo = $request->file('importar_modalidad');
            $nombre=$archivo->getClientOriginalName();
            $extension=$archivo->getClientOriginalExtension();
            if(!in_array($extension,['xls','xlsx','xlsm','xlsb'])){
                return back()->withErrors('el archivo que intenta 
                subir no es un archivo excel: xls, xlsx, xlsm, xlsb');
            }
            \Storage::disk('archivos')->put($nombre, \File::get($archivo) );
            $ruta  =  storage_path('archivos') ."/". $nombre;
            Excel::selectSheetsByIndex(0)->load($ruta, function ($hoja) {
                $hoja->each(function ($fila) {
                    $codigo_mod=Modal::query()->where('codigo_mod',$fila->codigo_mod)->get();
                    $nombre_mod=Modal::query()->where('nombre_mod',$fila->nombre_mod)->get();
                    if(count($codigo_mod)==0 && count($nombre_mod)==0){
                        $modalidad = new Modal();
                        $modalidad->create([
                            'codigo_mod' => $fila->codigo_mod,
                            'nombre_mod' => $fila->nombre_mod,
                            'descripcion_mod' => $fila->descripcion_mod
                        ]);
                    }
                });

            });
            \Storage::disk('archivos')->delete($nombre);
            return redirect()->route('modalidad');
        }catch (\Exception $exception){
            return back()->withErrors('no se puede importar');
        }

    }
}