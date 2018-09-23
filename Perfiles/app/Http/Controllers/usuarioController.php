<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users=User::all();
        return view('usuarios/listadoUsuarios',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear(){
        $roles=Role::all()->pluck('nombre_rol');
        return view('usuarios/crearUsuarios',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
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
            'role_id'=> ['required','not_in:seleccione una opcion']
        ]);
        $rol_id=Role::query()->where('nombre_rol',$request['role_id'])->value('id');
        $request['role_id']=$rol_id;
        $user=new User();
        $user->create($request->all());
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
        $roles=Role::all()->pluck('nombre_rol');
        return view('usuarios/editarUsuario',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, User $user){
        $this->validate(request(), [
            'name' => ['required'],
            'user_name' => ['required',Rule::unique('users')->ignore($user->id)],
            'email'=>['required','email',Rule::unique('users')->ignore($user->id)],
            'password' => '',
            'role_id'=> ['required']
        ]);
        $rol_id=Role::query()->where('nombre_rol',$request['role_id'])->value('id');
        $request['role_id']=$rol_id;
        if ($request['password'] != null){
            $request['password']=bcrypt($request['password']);
        }else{
            unset($request['password']);
        }
        $user->update($request->all());
        return redirect()->route('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function eliminar(User $user)
    {
        $user->delete();
        return redirect()->route('usuarios');
    }
}
