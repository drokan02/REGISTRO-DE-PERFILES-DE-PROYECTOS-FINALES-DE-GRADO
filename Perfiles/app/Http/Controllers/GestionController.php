<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GestionFormRequest;
use App\Gestion;

class GestionController extends Controller
{
    
    public function index(Request $request){
        $fila = 1;
        $gestiones = Gestion::orderBy('id','ASC')                
                            ->paginate(20);
        if ($request->ajax()) {
            return response()->json([
                view('parcial.gestiones',compact('gestiones','fila'))->render()
            ]);
        }
        return view('gestion.listarGestion',compact('gestiones','fila'));
    }

    public function registrar(){
        return view('gestion.registrarGestion');
    }

    public function almacenar(GestionFormRequest $request){
        if ($request->ajax()) {
            return response()->json([
                'mensaje'=> 'Gestion registrado correctamente'
            ]);
        }
        Gestion::create($request->all());
        return redirect()->route('gestiones');
    }

    public function editar(Gestion $gestion){
        return view('gestion.editarGestion',compact($gestion));
    }

    public function modificar(GestionFormRequest $request,Gestion $gestion){
        if ($request->ajax()) {
            return response()->json(
                ['mensaje'=> 'Gestion editado correctamente']
            );
        }
        $gestion->update($request->all);
        return redirect()->route('gestiones');
    }
}
