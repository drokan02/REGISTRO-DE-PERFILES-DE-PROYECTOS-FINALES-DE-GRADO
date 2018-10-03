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
		$buscar = $request->get('buscar');
		if($buscar != null){			
			$modalidad = Modal::buscar($buscar)->get();
			return view('modadelidad.listaModalidad',['modalidad'=> $modalidad,'buscar'=>$buscar , 'fila'=>1]);	
		}else{
			$modalidad = Modal::buscar('')->get();
			return view('modadelidad.listaModalidad',['modalidad'=> $modalidad,'buscar'=>null,'fila'=>1]);
		}
	}
	  
	public function registrar(Request $request){
		
        return view('modadelidad.registrarmodalidad');
    }
	
	public function almacenar(moddal $request){
		$modadelidad = new Modal;
		$modadelidad->create($request->all());
		return redirect()->route('modalidad');
	}


	public function editar($id){
		$modadelida=Modal::findOrFail($id);
		return view('modadelidad.editarmodal',['modadelidad'=>$modadelidad]);
	
	}

	public function modificar(moddal $request,$id){
		Modal::findOrFail($id)->update($request->all());
        return redirect()->route('modalidad');
	}

	
	
	public function ver($id){
		$modadelida=Modal::findOrFail($id);
		return view('modadelidad.ver',['modadelidad'=>$modadelidad]);
	}
}