<?php

namespace App\Http\Controllers;

use App\Area;
use App\Gestion;
use App\Modal;
use App\Perfil;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ReportesController extends Controller
{
    public function generar(){
        $areas=Area::query()->where('area_id',null)->get();
        $modalidades=Modal::all();
        $estados=['En progreso','Defendido','eliminado','Tribunal'];
        $perfiles=Perfil::all();
        $tutores=[];
        $i=0;
        $t=null;
        foreach ($perfiles as $perfil){
            $t=$perfil->tutor()->get()->first();
            $i=$t->id;
            $tutores=array_add($tutores,$i,$t);
            //$i=$i+1;
        }
        //dd($tutores);
        return view('reportes/generadorReportes',compact('areas','modalidades','estados','tutores'));
    }
    public function generador(Request $request){
        $this->validate(request(), [
            'area'=> ['required','not_in:seleccione una opcion'],
            'modalidad'=> ['required','not_in:seleccione una opcion'],
            'estado'=> ['required','not_in:seleccione una opcion'],
            'tutor'=> ['required','not_in:seleccione una opcion'],
            'cambio_tema'=> ['required','not_in:seleccione una opcion'],
            'trabajo_conjunto'=> ['required','not_in:seleccione una opcion'],
        ]);
        //dd($request['tutor']);
        $perfiles=null;
        if($request['area'] !== 'Todos'){
            $perfiles1=Perfil::query()->where('area_id',$request['area'])->get();
        }
        else{
            $perfiles1=Perfil::all();
        }
        if($request['modalidad'] !== 'Todos'){
            $perfiles2=Perfil::query()->where('modalidad_id',$request['modalidad'])->get();
        }
        else{
            $perfiles2=Perfil::all();
        }
        if($request['estado'] !== 'Todos'){
            $perfiles3=Perfil::query()->where('estado',$request['estado'])->get();
        }
        else{
            $perfiles3=Perfil::all();
        }
        if($request['tutor'] !== 'Todos'){
            $perfiless4=Perfil::all();
            $i=0;
            $t=null;
            $perfiles4=[];
            foreach ($perfiless4 as $perfil4){
                $t=$perfil4->tutor()->where('profesional_id',$request['tutor'])->get()->first();
                if(!empty($t)){
                    $perfiles4=array_add($perfiles4,$i,$perfil4);
                }
                $i=$i+1;
            }
        }
        else{
            $perfiles4=Perfil::all();
        }
        if($request['cambio_tema'] == "0"){
            $perfiles5=Perfil::query()->where('cambio_tema',null)->get();

        }
        else if($request['cambio_tema'] == "1"){
            $perfiles5=Perfil::query()->where('cambio_tema',"!=",null)->get();
        }else{
            $perfiles5=Perfil::all();
        }
        if($request['trabajo_conjunto'] == "0"){
            $perfiles6=Perfil::query()->where('trabajo_conjunto',null)->get();

        }
        else if($request['trabajo_conjunto'] == "1"){
            $perfiles6=Perfil::query()->where('trabajo_conjunto',"!=",null)->get();
        }else{
            $perfiles6=Perfil::all();
        }
        $perfiles=$perfiles1->intersect($perfiles2);
        $perfiles=$perfiles->intersect($perfiles3);
        $perfiles=$perfiles->intersect($perfiles4);
        $perfiles=$perfiles->intersect($perfiles5);
        $perfiles=$perfiles->intersect($perfiles6);

        return view('reportes/reporte',compact('perfiles'));
    }

    public function reporte(Request $request){
        $perfiles=$request['perfiles'];
        $perfiles=json_decode($perfiles,true);
        $perfilesPdf=new Collection();
        foreach ($perfiles as $perfil){
            $id=$perfil['id'];
            $per=Perfil::find($id);
            $perfilesPdf->add($per);
        }
        $pdf=PDF::loadView('reportes/reportePDF',compact('perfilesPdf'));
        return  $pdf->download();


    }
}
