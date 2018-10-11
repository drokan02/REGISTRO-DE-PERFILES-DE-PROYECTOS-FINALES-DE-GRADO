<?php

namespace App\Http\Controllers;
use App\Http\Requests\DocenteFormRequest;
//use App\Http\Requests;
use Illuminate\Http\Request;
use App\Docente;
use App\Profesional;
use App\Area;
use App\Titulo;
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
        $areas = Area::areas()->get();
        $subareas = Area::subareas()->get();
        $titulos = Titulo::all();

        return view('docentes.registrarDocentes',['areas'=>$areas, 'subareas'=>$subareas, 'titulos'=>$titulos ]);
    }
  

    public function almacenar(DocenteFormRequest $request){
        $areas = [$request->area_id,$request->subarea_id];
        $profesional = new Profesional;
        $docente = new Docente;
        $profesional->create($request->all());
        $prof_id = Profesional::where('ci_prof',$request['ci_prof'])->value('id');
        $profesional->areas()->attach($areas,['profesional_id'=>$prof_id]);
        $docente->profesional_id = $prof_id;
        $docente->carga_horaria = $request->carga_horaria;
        $docente->codigo_sis = $request->codigo_sis;
        $docente->save();
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
