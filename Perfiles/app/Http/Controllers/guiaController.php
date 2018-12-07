<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class guiaController extends Controller
{
    

        function __construct(){
            // $this->middleware('auth');
            //$this->middleware(['verificarCuenta']);
        }
    
        public function index(Request $request){
            return view('complementos.guiaform');
           
        }
    
}
