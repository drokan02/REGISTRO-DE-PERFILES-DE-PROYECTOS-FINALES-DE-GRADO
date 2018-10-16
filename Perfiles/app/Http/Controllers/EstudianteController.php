<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Estudiante;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EstudianteController extends Controller
{
    function __construct(){
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes=Estudiante::all();
        return view('estudiantes/listaEstudiantes',compact('estudiantes'));
    }
    /**
     * Display the specified resource.
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function detalle(Estudiante $estudiante)
    {
        return view('estudiantes/detalleEstudiante',compact('estudiante'));
    }
    /**
     * Show the form for editing the specified resource.
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function editar(Estudiante $estudiante)
    {
        $carreras=Carrera::all()->pluck('nombre_carrera');
        return view('estudiantes/editarEstudiante',compact('carreras','estudiante'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, Estudiante $estudiante)
    {
        $this->validate(request(), [
            'nombres' => 'required|max:255',
            'user_name' => ['required',Rule::unique('users')->ignore(auth()->user()->id),
                            Rule::unique('estudiantes')->ignore($estudiante->id),'alpha_num'],
            'email' => ['required','string','email','max:255',Rule::unique('users')->ignore(auth()->user()->id),
                        Rule::unique('estudiantes')->ignore($estudiante->id)],
            'telefono' => '',
        ]);
        //dd($request->all());
        DB::transaction(function () use($request,$estudiante) {
            $estudiante->update($request->all());
            $estudiante->usuario()->update([
                'name' => $request['nombres'],
                'user_name' => $request['user_name'],
                'email' => $request['email'],
            ]);
        });
        return redirect()->route('menu');
    }
    /**
     * Remove the specified resource from storage.
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Estudiante $estudiante)
    {
        DB::transaction(function () use($estudiante) {
            $estudiante->usuario()->delete();
            $estudiante->usuario()->detach();//eliminar datos en tabla intermedia
            $estudiante->delete();
        });
        return redirect()->route('menu');
    }
    public function cambiarContraseña(Estudiante $estudiante){
        return view('estudiantes/cambiarPassword',compact('estudiante'));
    }

    public function guardarContraseña(Request $request, Estudiante $estudiante){
        $this->validate(request(), [
            'password' => ['required','confirmed','min:6'],
        ]);
        $request['password']=bcrypt($request['password']);
        DB::transaction(function () use($request,$estudiante) {
        $estudiante->password=$request['password'];
        $estudiante->save();
        $estudiante->usuario()->update([
            'password'=>$request['password']
            ]);
        });
        return view('estudiantes/detalleEstudiante',compact('estudiante'));
    }
}
