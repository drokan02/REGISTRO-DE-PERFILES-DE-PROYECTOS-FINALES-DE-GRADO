<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GestionFormRequest;
use App\Gestion;

class GestionController extends Controller
{

    function __construct(){
        // $this->middleware('auth');
        //$this->middleware(['verificarCuenta']);
    }

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
        $año = date('Y');
        $mes = date('m');
        $periodo = 0;
        $gestiones = Gestion::whereYear('fecha_ini',$año)->get();
        $periodo = $gestiones[0]->periodo;
        if(!$gestiones->toArray()){
            if($mes < 7){
                $periodo = 1;
            }else{
                $periodo = 2;
            }
        }else if ($gestiones[0]->periodo > 1) {
            $periodo = 2;
        }else{
            $periodo = 2;
        }
        return view('gestion.registrarGestion',compact('periodo'));
    }

    public function almacenar(Request $request){
        $año = date('Y');
        $gestiones = Gestion::whereYear('fecha_ini',$año)->where('periodo',2)->get();
        if ($request->ajax()) {
            if(!$gestiones->toArray()){
                return response()->json([
                    'registrado' => true, 
                    'mensaje'=> 'Gestion registrado correctamente'
                ]);
            }else {
                return response()->json([
                    'mensaje'=> 'ya se tiene registrado las gestiones correspondientes a este Año'
                ]);
            }
        }
        //Gestion::create($request->all());
        return redirect()->route('gestiones');
    }

    public function editar(Gestion $gestion){
        return view('gestion.editarGestion',compact('gestion'));
    }

    public function modificar(Request $request,Gestion $gestion){
        if ($request->ajax()) {
            return response()->json(
                [
                    'registrado' => true, 
                    'mensaje'=> 'Gestion editado correctamente'
                ]
            );
        }
        $gestion->update($request->all());
        return redirect()->route('gestiones');
    }

    public function calcularPeriodo(){
       
       $bisiesto = $this->bisiesto($anio);
        switch ($mes) {
            case '1': return 31;break;
            case '2':  return ($bisiesto? 29 : 28);break;
            case '3': return 31;break;
            case '4': return 30;break;
            case '5': return 31;break;
            case '6': return 30;break;
            case '7': return 31;break;
            case '8': return 31;break;
            case '9': return 30;break;
            case '10': return 31;break;
            case '11': return 30;break;
            default:  return 31;break;
        }
    }

    public function bisiesto($anio){
        if($anio % 4 == 0  && ($anio % 100 != 0 || $anio % 400 == 0)){
            return true;
        }else{
            return false;
        }
    }
}
