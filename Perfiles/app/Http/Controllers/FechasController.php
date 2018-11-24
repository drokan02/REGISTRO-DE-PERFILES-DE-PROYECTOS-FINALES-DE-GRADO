<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use App\fechas;
use App\Http\Controllers\Controller;
use View;
use DB;

class FechasController extends Controller
{
   function _construct(){

   }
   public function index(){
    $fecha=fechas::where('titulo')
    ->orderBy('fechainicio','des')
    ->take(1)
    ->get();
   // foreach($fecha as $fechas){
    //	echo $fechas->fechafin;
   // }
    
   //	$date = Carbon::now();
  // 	$endDate = $date->subMonth();
   	//$date = $date->format('l jS \\of F Y h:i:s A');
   //	$date=Carbon::createFromDate(1990,8,12)->age;
   //	return View::make('fechas.registro')->with('fechas',$fecha);
   //	return view('fechas.registro',compact('fecha'));

   }
   public function guardar(Request $request){
   	$date=Carbon::now();
   	$fechas=new fechas;
   	$fechas->titulo="ingeneria de sistemas";
   	$fechas->fechainicio=$date;
   		$date=Carbon::now();

   	$fechas->fechafin=$date;
   	$fechas->save();
   	echo "se guardo correctamente";
   }
}
