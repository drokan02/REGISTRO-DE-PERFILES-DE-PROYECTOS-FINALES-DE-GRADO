<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\docentes;

class docenteController extends Controller
{
    public function index(Request $request){
    
        return view('docentes/listadoDocentes',compact('docente'));
    }
}
