<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

   
}
