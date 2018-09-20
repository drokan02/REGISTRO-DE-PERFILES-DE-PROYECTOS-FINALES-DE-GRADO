<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index(){
        $roles=Role::all();
        return view('roles/listaRoles',compact('roles'));
    }
    public function crear(){
        return view('roles/crearRoles');
    }
    public function guardar(Request $request){
        $this->validate(request(), [
            'nombre_rol' => ['required','Alpha'],
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
            'nombre_rol' => ['required','Alpha'],
            'privilegios'=> ['required','not_in:seleccione una opcion']
        ]);
        $role->update($_REQUEST);
        return redirect()->route('roles');
    }
    public function eliminar(Role $role){
        $role->delete();
        return redirect()->route('roles');
    }
}
