<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Area;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class CarreraController extends Controller
{
    function __construct(){
        //$this->middleware('auth');
        //$this->middleware(['verificarCuenta']);
        $this->middleware('permisos:carreras');
    }
    /**Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $buscar = $request['buscar'];
        $carreras=Carrera::name($buscar)->get();
        if ($request->ajax())
         {
            return response()->json([
                view('parcial.carreras',compact('carreras','buscar'))->render()
            ]);
        }
        return view('carreras/listaCarreras',compact('carreras','buscar'));
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
            'codigo_carrera' => ['required','unique:carrera,codigo_carrera'],
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
            'codigo_carrera' => ['required',Rule::unique('carrera')->ignore($carrera->id)],
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
        $docente = Carrera::join('docente','carrera.id','=','docente.docente_materia')
            ->where('carrera.id',$carrera->id)->get();
        $profesional = Carrera::join('profesional','carrera.id','=','profesional.carrera_id')
            ->where('carrera.id',$carrera->id)->get();
        $estudiante = Carrera::join('estudiante','carrera.id','=','estudiante.carrera_id')
            ->where('carrera.id',$carrera->id)->get();
        if(count($docente)==0 && count($profesional)==0 &&  count($estudiante)==0){
            $carrera->delete();
            
            return redirect()->route('carreras')->with('message','Carrera eliminada con éxito');
        }else{
            return back()->with('message','No se puede eliminar la carrera debido a que esa asociada con otros datos');
        }
        
    }
    public function importar(){
        return view('carreras/importarCarrera');
    }


    public function importacion(Request $request){
        $this->validate(request(), [
            'importar_carreras' => ['required'],
        ]);
        try{
            $archivo = $request->file('importar_carreras');
            $nombre=$archivo->getClientOriginalName();
            $extension=$archivo->getClientOriginalExtension();
            if(!in_array($extension,['xls','xlsx','xlsm','xlsb'])){
                return back()->withErrors('el archivo que intenta 
                subir no es un archivo excel: xls, xlsx, xlsm, xlsb');
            }
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
        }catch (\Exception $e){
            return back()->withErrors('no se puede importar, los campos deben ser: 
            codigo_carrera, nombre_carrera, descripcion');
        }
    }

    public function areas(Request $request,Carrera $carrera){
        $fila = 1;
        $areas = Area::areas()->get();
        return view('carreras.areasCarrera',compact('areas','carrera','areasCarrera','fila'));
    }

    public function almacenarArea(Request $request,Carrera $carrera){
        $area_id  = $request['area_id'];
        if($request->ajax()){
            if($area_id){
                $registrado = $this->agregarArea($carrera,$area_id);
                if ($registrado) {
                    return response()->json([
                        'registrado'=> true,
                        'mensaje'   => 'Area agregada Correctamente',
                        'datos'     => $this->parcialAreas($carrera)
                    ]);
                }else{
                    return response()->json([
                        'registrado'=> false,
                        'mensaje'   => 'La Carrera ya tiene agregada esa Area'
                    ]);
                }
            }else{
                return response()->json([
                    'registrado'=> false,
                    'mensaje'   => 'Debe seleccionar una Area'
                ]);
            }
        }
       
       
    }

    public function agregarArea($carrera,$area_id){
        $area = Area::find($area_id);
        $areas = $area->sub->pluck('id');
        $areas[] = $area_id+0;
        $carrera_id = $carrera->toArray()['id'];
        $valido = $this->valido($carrera,$area_id);
		if($valido){
            $carrera->areas()->attach($areas,['carrera_id'=>$carrera_id]);
			return true;
		}else{
			return false;
		}
    }

    public function valido($carrera,$area_id){
		$aux = $carrera->areas->where('id',$area_id);
		$aux = $aux->toArray();
		if($aux){
			return false;//retornamos false por que esta registrado ya esa carrera
		}else{
			return true;//retornamos verdad por q no esta registrado y asi poder registrarlo
		}
			
    }
    
    public function parcialAreas($carrera){
        $fila = 1;
        $carrera_id = $carrera->toArray()['id'];
        $carrera = Carrera::find($carrera_id);
        return view('parcial.areasCarrera',compact('carrera','fila'))->render();
    }

    public function eliminarArea(Request $request,Carrera $carrera,Area $area){
        $areas = $area->sub->pluck('id');
        $areas[] = $area->toArray()['id'];
        $carrera->areas()->detach($areas);
        if($request->ajax()){
			return response()->json([
				"eliminado"=>true,
				"mensaje" => "Se elimino el area de la carrera correctamente",
				"datos"   => $this->parcialAreas($carrera)
			]);
		}
    }
}