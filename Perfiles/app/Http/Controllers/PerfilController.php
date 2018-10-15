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
        $modalidades=Modal::all();
        return view('perfiles/seleccionFormulario',compact('modalidades'));
    }

    public function formulario(Request $request){
        $this->validate(request(), [
            'modalidad' => ['required','not_in:seleccione una opcion'],
        ]);
        $docentes=Docente::all();
        $areas=Area::all();
        $profesionales=Profesional::all();
        $modalidad=$request['modalidad'];
        if($modalidad=='tesis' || $modalidad=='proyecto de grado'){
            return view('perfiles/formTesisProyGrado',compact('modalidad','docentes','areas','profesionales'));
        }else{
            return view('perfiles/formAdsTrabDir',compact('modalidad','docentes','areas','profesionales'));
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
