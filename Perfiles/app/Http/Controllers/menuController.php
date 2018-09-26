<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class menuController extends Controller
{
   public function index(){
   		return view('layouts.menu');
   }

   //listarturor

   public function listarTutor(){
       return view('profesionales.listarTutor');
   }
}
