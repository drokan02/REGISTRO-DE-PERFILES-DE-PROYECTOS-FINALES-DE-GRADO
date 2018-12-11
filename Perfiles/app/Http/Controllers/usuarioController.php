<?php

namespace App\Http\Controllers;

use App\Permiso;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use function Sodium\add;

class usuarioController extends Controller
{
    function __construct(){
       // $this->middleware('auth');
        //$this->middleware(['verificarCuenta']);
    }
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $buscar = $request->get('buscar');
        $users=User::name("$buscar")
                    ->paginate(20);
        if($request->ajax()){
            return response()->json(
                view('parcial.usuarios',compact('users','buscar'))->render()
            );
        }
        return view('usuarios/listadoUsuarios',compact('users','buscar'));
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function crear(){
        $roles=Role::all()->pluck('nombre_rol','id');
        foreach($roles as $id=>$nombre_rol){
            if($nombre_rol=='estudiante' || $nombre_rol=='docente'){
                $roles=array_except($roles,$id);
            }
        }
        return view('usuarios/crearUsuarios',compact('roles'));
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $this->validate(request(), [
            'name' => ['required','regex:/^[\pL\s]+$/u'],
            'user_name' => ['required','unique:users,user_name','alpha_num'],
            'email' => ['required','email','unique:users,email','regex:/[a-z-_.0-9]+@(gmail|hotmail|yahoo|outlook).(com|es|org)/u'],
            'password' => ['required','min:6'],
            'roles'=>'required'
        ]);

        $roles1=$request['roles'];
        $permisos=[];
        $i=0;
        foreach ($roles1 as $role){
            $roles=Role::findOrFail($role);
            $aux=$roles->permisos()->pluck('name');
            foreach ($aux as $a) {
                $per=Permiso::query()->where('name',$a)->get()->first();
                $per=$per->id;
                $permisos=array_add($permisos,$i,$per);
                $i=$i+1;
            }
        }
        if($request->ajax()){
            return response()->json([
                'mensaje'=>'Usuario registrado correctamente'
            ]);
        }

        $request['password']=bcrypt($request['password']);
        DB::transaction(function () use($request,$permisos) {
            $user=new User();
            $user->create($request->all());
            $iduser=User::query()->where('email',$request['email'])->value('id');
            $user->roles()->attach($request['roles'],['user_id'=>$iduser]);
            $user->permisosUser()->attach($permisos,['user_id'=>$iduser]);
        });
        return redirect()->route('usuarios');
    }
    /**
     * Display the specified resource.
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function detalle(User $user){
        return view('usuarios/detalleUsuario',compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function editar(User $user){
        $roles=Role::all()->pluck('nombre_rol','id');
        return view('usuarios/editarUsuario',compact('user','roles'));
    }
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, User $user){
        $this->validate(request(), [
            'name' => ['required','regex:/^[\pL\s]+$/u'],
            'user_name' => ['required',Rule::unique('users')->ignore($user->id),'alpha_num'],
            'email'=>['required','email',Rule::unique('users')->ignore($user->id),
                    'regex:/[a-z-_.0-9]+@(gmail|hotmail|yahoo|outlook).(com|es|org)/u'],
            'roles'=> ['required']
        ]);
        if($request->ajax()){
            return response()->json([
                'mensaje'=>'Usuario modificado correctamente'
            ]);
        }
        $roles1=$request['roles'];
        $permisos=[];
        $i=0;
        foreach ($roles1 as $role){
            $roles=Role::findOrFail($role);
            $aux=$roles->permisos()->pluck('name');
            foreach ($aux as $a) {
                $per=Permiso::query()->where('name',$a)->get()->first();
                $per=$per->id;
                $permisos=array_add($permisos,$i,$per);
                $i=$i+1;
            }
        }
        DB::transaction(function () use($request,$user,$permisos) {
            $user->update($request->all());
            $iduser=User::query()->where('email',$request['email'])->value('id');
            $user->roles()->sync($request['roles'],['user_id'=>$iduser]);
            $user->permisosUser()->sync($permisos,['user_id'=>$iduser]);
        });
        return redirect()->route('usuarios');
    }
    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request,User $user){
        $user->permisosUser()->detach();
        $user->roles()->detach(); //eliminar datos en tabla intermedia
        $user->delete();
        if($request->ajax()){
            return response()->json([
                'eliminado'=>true,
                'mensaje'=>'El Usuario se elimino correctamente'
            ]);
        }
        return redirect()->route('usuarios');
    }

    public function cambiarContraseña(User $user){
        return view('usuarios/cambiarPassword',compact('user'));
    }

    public function guardarContraseña(Request $request, User $user){
        $this->validate(request(), [
            'password' => ['required','confirmed','min:6'],
        ]);
        $request['password']=bcrypt($request['password']);
        $user->password=$request['password'];
        $user->save();
        return view('usuarios/detalleUsuario',compact('user'));
    }
}