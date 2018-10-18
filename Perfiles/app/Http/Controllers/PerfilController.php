<?php

namespace App\Http\Controllers;

use App\Area;
use App\Docente;
use App\Modal;
use App\Perfil;
use App\Profesional;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function seleccion(){
        $modalidades=Modal::all()->pluck('nombre_mod');
        $areas=Area::all()->where('id_area',null);
        return view('perfiles/seleccionFormulario',compact('modalidades','areas'));
    }

    public function formulario(Request $request){
        $this->validate(request(), [
            'modalidad' => ['required','not_in:seleccione una opcion'],
            'area' => ['required','not_in:seleccione una opcion'],
        ]);
        $docentes=Docente::all();
        $subAreas=Area::query()->where('id_area',$request['area'])->get();
        $areaProf=Area::find($request['area']);
        $area=Area::query()->where('id',$request['area'])->pluck('nombre')->implode('');
        $profesionales=$areaProf->profesionales()->get();
        $modalidad=$request['modalidad'];
        $estudiante=auth()->user()->estudiante()->first();
        //dd($area);
        if($modalidad === "proyecto de grado" || $modalidad === "tesis"){
            return view('perfiles/formTesisProyGrado',compact('modalidad','subAreas','area','profesionales', 'estudiante'));
        }else{
            return view('perfiles/formAdsTrabDir',compact('modalidad','subAreas','area','profesionales', 'estudiante'));
        }
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Perfil $perfil)
    {
        //
    }

    public function edit(Perfil $perfil)
    {
        //
    }

    public function update(Request $request, Perfil $perfil)
    {
        //
    }

    public function destroy(Perfil $perfil)
    {
        //
    }

}
