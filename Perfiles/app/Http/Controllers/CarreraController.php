<?php

namespace App\Http\Controllers;

use App\Carrera;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class CarreraController extends Controller
{
    function __construct(){
        //$this->middleware('auth');
    }
    /**Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $carreras=Carrera::name($request->get('name'))->get();
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
            'codigo_carrera' => ['required','unique:carreras,codigo_carrera'],
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
            'codigo_carrera' => ['required',Rule::unique('carreras')->ignore($carrera->id)],
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
    public function importar(){
        return view('carreras/importarCarrera');
    }


    public function importacion(Request $request){
        $archivo = $request->file('importar_carreras');
        $nombre=$archivo->getClientOriginalName();
        \Storage::disk('archivos')->put($nombre, \File::get($archivo) );
        $ruta  =  storage_path('archivos') ."/". $nombre;
            Excel::selectSheetsByIndex(0)->load($ruta, function ($hoja) {
                $hoja->each(function ($fila) {
                    $codigo=Carrera::query()->where('codigo_carrera',$fila->codigo_carrera)->get();
                    if(count($codigo)==0){
                        $carrera = new Carrera();
                        $carrera->create([
                            'codigo_carrera' => $fila->codigo_carrera,
                            'nombre_carrera' => $fila->nombre_carrera,
                            'descripcion' => $fila->descripcion
                        ]);
                    }
                });

            });
        \Storage::disk('archivos')->delete($nombre);
        return redirect()->route('carreras');
    }
}