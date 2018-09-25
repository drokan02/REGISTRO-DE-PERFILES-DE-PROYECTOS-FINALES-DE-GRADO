<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class modalidades extends Controller
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
		 $data = Modadelidad::all();
		return view('modadelidad.lista',['modadelidad'=> $data ]);
	}

	public function registrar(){
		return view('modadelidad.registrarmodalidad');
	}

	public function guardar(ModalFormRequest $request){
		$modadelidad = new Modal;
		$modadelidad->nombre = $request->get('nombre');
		$modadelidad->descripsion = $request->get('descripsion');
		$modadelidad->save();
		return Redirect::to('modadelidad');
	}

	public function codigo($id){
		$modadelidad=Codigos::findOrFail($id);
		return view('codigo',['codigo'=>$area]);
	
	}

	public function actualizar(Request $request,$id){
		Modadelidad::findOrFail($id)->update($request->all());
        return redirect('modadelidad');
	}

	}
