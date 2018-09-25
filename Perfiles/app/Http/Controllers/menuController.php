<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class menuController extends Controller
{
   public function index(){
   		return view('layouts.menu');
   }

<<<<<<< HEAD
   public function listarAreas(){
        return view('area.listarAreas');
   }

   public function listaModalidad(){
    return view('modadelidad.listaModalidad');
   }   
=======
>>>>>>> d987537add4de8029d441940e355f74b421db180
}
