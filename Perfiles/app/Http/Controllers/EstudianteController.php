<?php

namespace App\Http\Controllers;

use App\Carrera;
use App\Estudiante;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EstudianteController extends Controller
{
    function __construct(){
        //$this->middleware('auth');
        //$this->middleware(['verificarCuenta']);
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
    public function crear(){
        $carreras=Carrera::all()->pluck('nombre_carrera');
        return view('estudiantes/crearEstudiante',compact('carreras'));
    }
    public function guardar(Request $request){
        $this->validate(request(), [
            'nombres' => ['required','max:255','regex:/^[\pL\s]+$/u'],
            'user_name' => ['required','unique:users,user_name','unique:estudiante,user_name','alpha_num'],
            'email' => ['required','unique:users,email','unique:estudiante,email','email'],
            'password' => 'required|string|min:6|confirmed',
            'telefono' => 'required|digits_between:7,8',
            'carrera'=> ['required','not_in:seleccione una opcion']
        ]);
        if($request->ajax()){
            return response()->json([
                'mensaje'=>'Te has registrado Correctamente'
            ]);
        }
        DB::transaction(function () use($request) {
            $user =new User();
            $user->create([
                'name' => $request['nombres'],
                'user_name' => $request['user_name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
            ]);
            $request['password']=bcrypt($request['password']);
            $idcarrera=Carrera::query()->where('nombre_carrera',$request['carrera'])->value('id');
            $request['carrera']=$idcarrera;
            $estudiante=new Estudiante();
            $estudiante->create([
                'nombres' => $request['nombres'],
                'user_name' => $request['user_name'],
                'email' => $request['email'],
                'password' => $request['password'],
                'telefono' => $request['telefono'],
                'carrera_id'=> $request['carrera']
            ]);
            $role_id=Role::query()->where('nombre_rol','estudiante')->value('id');
            $iduser=User::query()->where('email',$request['email'])->value('id');
            $idEstudiante=Estudiante::query()->where('email',$request['email'])->value('id');
            $user->roles()->attach($role_id,['user_id'=>$iduser]);
            $user->estudiante()->attach($idEstudiante,['user_id'=>$iduser]);
        });
        return redirect()->route('estudiantes');
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
        if($request->ajax()){
           return response()->json([
               'mensaje'=>'Datos personales Modificados correctamente'
            ]);
        }
        $this->validate(request(), [
            'nombres' => ['required','max:100','regex:/^[\pL\s]+$/u'],
            'user_name' => ['required',Rule::unique('users')->ignore($estudiante->usuario()->first()->id),
                            Rule::unique('estudiante')->ignore($estudiante->id),'alpha_num'],
            'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($estudiante->usuario()->first()->id),
                        Rule::unique('estudiante')->ignore($estudiante->id)
                        ,'regex:/[a-z-_.0-9]+@(gmail|hotmail|yahoo|outlook).(com|es|org)/u'],
            'telefono' => 'required|numeric|digits_between:7,8',
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
        //return redirect()->route('menu');
        return redirect()->route('detalleEstudiante',$estudiante)->with('actualizarEstudiante','el estudiante fue actualizado');
    }
    /**
     * Remove the specified resource from storage.
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Estudiante $estudiante)
    {
        $est = Estudiante::join('estudiante_perfil','estudiante.id','=','estudiante_perfil.estudiante_id')
            ->where('estudiante.id',$estudiante->id)->get();
        if(count($est)==0){
            DB::transaction(function () use($estudiante) {
                $estudiante->usuario()->delete();
                $estudiante->usuario()->detach();//eliminar datos en tabla intermedia
                $estudiante->delete();
            });
            return redirect()->route('estudiantes')->with('eliminarEstudiante','el estudiante fue eliminado');
        }else{
            return redirect()->back()->with('eliminarEstudiante','El estudiante no puede ser eliminado, debido a que ya registró su perfil');
           
        }
        
        /*
        DB::transaction(function () use($estudiante) {
            $estudiante->usuario()->delete();
            $estudiante->usuario()->detach();//eliminar datos en tabla intermedia
            $estudiante->delete();
        });
        return redirect()->route('estudiantes')->with('eliminarEstudiante','el estudiante fue eliminado');
        */
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
