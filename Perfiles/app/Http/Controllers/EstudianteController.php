<?php

namespace App\Http\Controllers;
use Storage;
use App\Carrera;
use App\Estudiante;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
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
                        Rule::unique('estudiante')->ignore($estudiante->id)],
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
    public function importar(){
        $carreras=Carrera::all()->pluck('nombre_carrera');
        return view('estudiantes/importarEstudiantes');
    }

    public function importacion(Request $request){
        $this->validate(request(), [
            'importar_estudiantes' => ['required'],
        ]);
      //   try{
            $archivo = $request->file('importar_estudiantes');
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
                   

                            $apellido_paterno =$fila->apellido_paterno;
                            $apellido_materno =$fila->apellido_materno;
                            $nombre=$fila->nombre;
                            $nombres=$apellido_paterno." ".$apellido_materno." ".$nombre;
                    $user_name=User::query()->where('user_name',$fila->user_name)->get();
                    $email=User::query()->where('email',$fila->email)->get();
               
                    if(count($user_name)==0 && count($email)==0 ){
                    $user =new User();
            $user->create([

                'name' => $nombres,
                'user_name' =>$fila->user_name,
                'email' => $fila->email,
                'password' => bcrypt($fila->password),
            ]);
        }
                    $user_name=Estudiante::query()->where('user_name',$fila->user_name)->get();
                    $email=Estudiante::query()->where('email',$fila->email)->get();
                    if(count($user_name)==0 && count($email)==0 ){
                        $estudiantes = new Estudiante();
                        $estudiantes->create([
                           
                            'nombres'=>$nombres,
                            'email' => $fila->email,
                            'user_name' =>$fila->user_name,
                            'password'  =>bcrypt($fila->password),
                            'telefono'  =>$fila->telefono,
                            'carrera_id'=>$fila->carrera_id,
                        
                        ]);}
                        
                        $role_id=Role::query()->where('nombre_rol','estudiante')->value('id');
                        $iduser=User::query()->where('email',$fila->email)->value('id');
                        $idEstudiante=Estudiante::query()->where('email',$fila->email)->value('id');
                        $user->roles()->attach($role_id,['user_id'=>$iduser]);
                        $user->estudiante()->attach($idEstudiante,['user_id'=>$iduser]);

                        $data=['nombres'=> $nombres,'user_name'=>$fila->user_name,'email'=>$fila->email,'password' =>$fila->password,];
                        Mail::send('emails.importacionCuenta',$data, function($message) use($fila)  {
                         $message->to($fila->email, $fila->user_name)->subject('Creacion de tu Cuenta en el Sistema de perfil');
                        });
                       
                });

            });
            \Storage::disk('archivos')->delete($nombre);
            return redirect()->route('estudiantes');
     //  }catch (\Exception $exception){
        //   return back()->withErrors('no se puede importar');
     // }

    }
}
