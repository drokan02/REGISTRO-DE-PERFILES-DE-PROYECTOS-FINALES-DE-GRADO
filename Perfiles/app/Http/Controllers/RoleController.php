<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index(Request $request){
        $roles=Role::name($request->get('name'))->get();
        return view('roles/listaRoles',compact('roles'));
    }
    public function crear(){
        return view('roles/crearRoles');
    }
    public function guardar(Request $request){
        $this->validate(request(), [
            'nombre_rol' => ['required'],
            'privilegios'=> ['required','not_in:seleccione una opcion']
        ]);
        $rol=new Role();
        $rol->create($request->all());
        return redirect()->route('roles');
    }
    public function editar(Role $role){
        return view('roles/editarRol',compact('role'));
    }
    public function actualizar(Role $role){
        $this->validate(request(), [
            'nombre_rol' => ['required'],
            'privilegios'=> ['required','not_in:seleccione una opcion']
        ]);
        $role->update($_REQUEST);
        return redirect()->route('roles');
    }
    public function eliminar(Role $role){
        if($role->users->toArray() != []){ //para no eliminar un rol que tiene usuarios
            return back()->withErrors('no se puede eliminar el rol porque hay
            usuarios con este rol');
        } else{
            $role->delete();
            return redirect()->route('roles');
        }
    }
}
