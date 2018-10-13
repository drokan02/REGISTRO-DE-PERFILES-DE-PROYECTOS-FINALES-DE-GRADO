<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\moddal;
use Illuminate\Validation\Rule;
//use Validator;
use App\Modal;
//use DB;

class modalidades extends Controller
{
    function __construct(){
        $this->middleware('auth');
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
		
		return view('modadelidad/listaModalidad',compact('modalidades'));
	}
	  
	public function registrar(Request $request){
		
        return view('modadelidad.registrarmodalidad');
    }
	
	public function almacenar(Request $request){
		$this->validate(request(), [
			'nombre_mod'=>['required','regex:/^[\pL\s]+$/u'],
			'codigo_mod' => ['required','alpha_num','unique:modalidad,codigo_mod'],
            'descripsion_mod'=> ['required']
        ]);
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
            'nombre_mod'=>['required','regex:/^[\pL\s]+$/u'],
            'descripsion_mod'=> ['required']
        ]);
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
    public function eliminar(Modal $modalidad){
		$modalidad->delete();               //eliminar datos en tabla intermedia
        return redirect()->route('modalidad');
    }
}