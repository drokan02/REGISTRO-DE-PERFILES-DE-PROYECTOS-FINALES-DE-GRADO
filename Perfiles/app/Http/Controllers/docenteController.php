<?php

namespace App\Http\Controllers;
use App\Http\Requests\DocenteFormRequest;
//use App\Http\Requests;
use Illuminate\Http\Request;
use App\docentes;
use App\Profesional;
use Validator;
use DB;


class docenteController extends Controller
{
    public function __contruct(){
	
	}
    public function index(Request $request){
  

       
       $buscar = $request->get('buscar');
        $docentes = docentes::buscarDocentes($buscar)
        ->orderBy('id','ASC')
				->paginate(5);
			
		return view('docentes.listadoDocentes',['docentes'=> $docentes,'buscar'=>$buscar , 'fila'=>1]);
       
        
    }
    public function registrar(){
       return view('docentes.registrarDocentes');
    }
  

    public function almacenar(DocenteFormRequest $request){
       /* $datos = $request->all();
        $profecional = new Profecional;
        $profecional->nombre_prof = $datos->nombre;


        $profecional->save();
        $id = profesional::where('nombre_prof',$datos-> nombre)->value('id');
        $docente = new Docente;
        $docente->profecional_id = $id;
        $docente->carga_horaria = $datos->carga_horaria;
        $docente->carga_horaria = $datos->codigo_sis;
        $docente->save();*/
        $docente = new docentes;
		$docente->create($request->all());
		return redirect()->route('Docentes');
        

    }
    public function ver($id){
		$docente=docentes::findOrFail($id);
		
		return view('docentes.ver',['docente'=>$docente]);
    }
    public function editar($id){
		$docente=docentes::findOrFail($id);
		return view('docentes.editar',['docente'=>$docente]);
    }
    public function modificar(DocenteFormRequest $request,$id){
		docentes::findOrFail($id)->update($request->all());
        return redirect()->route('Docentes');
    }
    public function eliminar($id){
		
			docentes::findOrFail($id)->delete();
			return redirect()->route('Docentes');
    }

}
