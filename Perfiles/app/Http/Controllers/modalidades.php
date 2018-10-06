<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\moddal;
use Validator;
use App\Modal;
use DB;

class modalidades extends Controller
{
    public function __contruct(){
	
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
			'nombre_mod'=>['required'],
			'codigo_mod' => ['required'],
            'descripsion_mod'=> ['required']
        ]);
		$modadelidad = new Modal;
		$modadelidad->create($request->all());
		return redirect()->route('modalidad');
	}
	 
	/**
     * Show the form for editing the specified resource.
     * @param Modal $user
     * @return \Illuminate\Http\Response
     */
    public function editar(Modal $modalidad){
       $modadelidad=Modal::findOrFail($modalidad);
      return view('modadelidad/editarmodal',compact('modalidad','modadelidad'));
	}
	

	public function modificar(moddal $request,$modalidad){
		Modal::findOrFail($modalidad)->update($request->all());
        return redirect()->route('modalidadd');
	}

	
	
	public function ver($id){
		$modadelidad=Modal::findOrFail($id);
		return view('modadelidad/ver',compact('id','modadelidad'));
	}

	/**
     * Remove the specified resource from storage.
     * @param Modal $user
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Modal $modalidad){
		$modalidad->delete();               //eliminar datos en tabla intermedia
	
        return redirect()->route('modalidad');
    }
}