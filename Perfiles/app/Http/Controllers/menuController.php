<?php

namespace App\Http\Controllers;

use App\Perfil;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class menuController extends Controller
{
    function __construct(){
        //$this->middleware('auth');
        //$this->middleware(['verificarCuenta']);
    }

    public function index(){
   		return view('layouts.menu');
   }

   //listarturor

   public function listarTutor(){
       return view('profesionales.listarTutor');
   }
   public function listarAreas(){
        return view('area.listarAreas');
   }

   public function listaModalidad(){
    return view('modadelidad.listaModalidad');
   }   
   //listarturor
    public function notificar(){
        $perfiles=Perfil::all();
        foreach ($perfiles as $perfil){
            $fechaInicio=$perfil->fecha_ini;
            $fechaFin=$perfil->fecha_fin;
            $fechaActual=Carbon::now();
            $diferencia=$fechaActual->diffInDays($fechaFin);
            $estado=$perfil->estado;
            if($diferencia>0 && $estado == "En Progreso"){
                $estudiantes=$perfil->estudiantes()->get();
                foreach ($estudiantes as $estudiante){
                    $data=['estudiante'=> $estudiante,'fechaFin'=>$fechaFin,'fechaInicio'=>$fechaInicio,'diferencia'=>$diferencia];
                    Mail::send('emails.notificacion',$data, function($message) use ($estudiante) {
                        $message->to($estudiante->email, $estudiante->nombres)->subject('Tiempo de tu perfil');
                    });
                }
            }
        }
        return redirect()->route('menu');
    }


}
