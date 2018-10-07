<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\docentes;
use App\Profesional;
use DB;


class docenteController extends Controller
{
    public function __contruct(){
	
	}
    public function index(Request $request){
    
       /* $busqueda = $request->input('name');
        //  $consulta_ejm = DB::select("select 'me llamo Adrian';");
         //dd($consulta_ejm);
         // return view('docentes/listadoDocentes',compact('docente'))
          $docente=docentes::all();
          foreach($docente as $docentes){
            echo $docentes->profesional_id;
        }
          $profesionales=new Profesional;
          $profesionales=Profesional::all();
          foreach($profesionales as $pro){
            echo $pro->nombre_prof;
         }
          $buscar=docentes::BuscarProfesional($request->name)
           ->leftjoin('profesional','docente.profesional_id','=','profesional.id')
           ->select('docente.*','Profesional.nombre_prof as profesionales','Profesional.ap_pa_prof as profesionales')
           ->paginate(4);
           return view ('docentes.listadoDocentes',Compact('docentes')); */
         $buscar = $request->get('buscar');
        // dd($buscar);
          $docentes = docentes::BuscarDocentes($buscar)
                  ->orderBy('id','ASC')
                  ->paginate(5);
          return view('docentes.listadoDocentes',['docentes'=> $docentes,'buscar'=>$buscar , 'fila'=>1]);
                
         
        }
          /* public function registrar(Request $datosDeDocente){
            $nombre = $datosDeDocente->input('nombreDoc');
            $apellido = $datosDeDocente->input('apellidosDoc');
            DB::query("insert into docentes(nombre, apellido) values ($nombre, $apellido);");
            echo "".$nombre." ".$apellido;
        
    }*/
    public function registrar(){
      return view('docentes.registrarDocentes');
    }
  

    public function almacenar(DocenteRequest $request){
        $datos = $request->all();
        $profecional = new Profecional;
        $profecional->nombre_prof = $datos->nombre;


        $profecional->save();
        $id = profesional::where('nombre_prof',$datos-> nombre)->value('id');
        $docente = new Docente;
        $docente->profecional_id = $id;
        $docente->carga_horaria = $datos->carga_horaria;
        $docente->carga_horaria = $datos->codigo_sis;
        $docente->save();
        

    }
    public function ver($id){
		$docente=docentes::findOrFail($id);
		//$subareas = $area->subareas($id)->get();
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
		
			Area::findOrFail($id)->delete();
			return redirect()->route('Areas');
    }

}
