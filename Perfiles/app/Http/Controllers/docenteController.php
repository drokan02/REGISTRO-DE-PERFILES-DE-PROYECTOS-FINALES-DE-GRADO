<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\docentes;
use App\Profecioal;

class docenteController extends Controller
{
    public function index(Request $request){
    
        $busqueda = $request->input('name');
        //  $consulta_ejm = DB::select("select 'me llamo Adrian';");
         //dd($consulta_ejm);
         // return view('docentes/listadoDocentes',compact('docente'));
         $buscar = $request->get('buscar');
          $docentes = docentes::buscar($buscar)
                  ->orderBy('id','ASC')
                  ->paginate(5);
          return view('docentes.listadoDocentes',['docentes'=> $docentes,'buscar'=>$buscar , 'fila'=>1]);
        }
           public function registrar(Request $datosDeDocente){
            $nombre = $datosDeDocente->input('nombreDoc');
            $apellido = $datosDeDocente->input('apellidosDoc');
            DB::query("insert into docentes(nombre, apellido) values ($nombre, $apellido);");
            echo "".$nombre." ".$apellido;
        
    }

    public function almacenar(DocenteRequest $request){
        $datos = $request->all();
        $profecional = new Profecional;
        $profecional->nombre_prof = $datos->nombre;


        $profecional->save();
        $id = Profesional::where('nombre_prof',$datos-> nombre)->value('id');
        $docente = new Docente;
        $docente->profecional_id = $id;
        $docente->carga_horaria = $datos->carga_horaria;
        $docente->carga_horaria = $datos->codigo_sis;
        $docente->save();
        

    }


}
