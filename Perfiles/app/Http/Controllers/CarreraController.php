<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $carreras=Carrera::all();
        return view('carreras/listaCarreras',compact('carreras'));
    }
    /**Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('carreras/crearCarrera');
    }
    /**Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request){
        $this->validate(request(), [
            'codigo_carrera' => ['required'],
            'nombre_carrera'=> ['required'],
            'descripcion'=>'required'
        ]);
        $carrera=new Carrera();
        $carrera->create($request->all());
        return redirect()->route('carreras');
    }
    /**Display the specified resource.
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function detalle(Carrera $carrera){
        //
    }
    /**Show the form for editing the specified resource.
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function editar(Carrera $carrera){
        return view('carreras/editarCarrera',compact('carrera'));
    }
    /**Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, Carrera $carrera)
    {
        $this->validate(request(), [
            'codigo_carrera' => ['required'],
            'nombre_carrera'=> ['required'],
            'descripcion'=>'required'
        ]);
        $carrera->update($request->all());
        return redirect()->route('carreras');
    }
    /**Remove the specified resource from storage.
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Carrera $carrera)
    {
        $carrera->delete();
        return redirect()->route('carreras');
    }
}
