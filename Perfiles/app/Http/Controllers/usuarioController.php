<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $users=User::name($request->get('name'))->get();
        return view('usuarios/listadoUsuarios',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function crear(){
        $roles=Role::all()->pluck('nombre_rol','id');
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
            'name' => ['required'],
            'user_name' => ['required','unique:users,user_name'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required'],
            'roles'=>'required'
        ]);
        $request['password']=bcrypt($request['password']);
        DB::transaction(function () use($request) {
            $user=new User();
            $user->create($request->all());
            $iduser=User::query()->where('email',$request['email'])->value('id');
            $user->roles()->attach($request['roles'],['user_id'=>$iduser]);
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
            'name' => ['required'],
            'user_name' => ['required',Rule::unique('users')->ignore($user->id)],
            'email'=>['required','email',Rule::unique('users')->ignore($user->id)],
            'roles'=> ['required']
        ]);
        DB::transaction(function () use($request,$user) {
            $user->update($request->all());
            $iduser=User::query()->where('email',$request['email'])->value('id');
            $user->roles()->sync($request['roles'],['user_id'=>$iduser]);
        });
        return redirect()->route('usuarios');
    }
    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function eliminar(User $user){
        $user->roles()->detach(); //eliminar datos en tabla intermedia
        $user->delete();
        return redirect()->route('usuarios');
    }
    public function cambiarContraseña(User $user){
        return view('usuarios/cambiarPassword',compact('user'));
    }
    public function guardarContraseña(Request $request,User $user){
        $this->validate(request(), [
            'password' => ['required','confirmed','min:6'],
        ]);
        $request['password']=bcrypt($request['password']);
        $user->password=$request['password'];
        $user->save();
        return view('usuarios/detalleUsuario',compact('user'));
    }

}