<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    function __construct(){
       // $this->middleware('auth');
    }
    public function index(Request $request){
        $buscar = $request->get('buscar');
        $roles=Role::name($buscar)
                    ->paginate(15);
        if($request->ajax()){
            return response()->json(
                view('parcial.roles',compact('roles','buscar'))->render()
            );
        }
        return view('roles/listaRoles',compact('roles','buscar'));
    }
    public function crear(){
        return view('roles/crearRoles');
    }
    public function guardar(Request $request){
        $this->validate(request(), [
            'nombre_rol' => ['required','regex:/^[\pL\s]+$/u'],
            'privilegios'=> ['required','not_in:seleccione una opcion']
        ]);

        if($request->ajax()){
            return response()->json([
                'mensaje'=>'Rol registrado correctamente'
            ]);
        }
        $rol=new Role();
        $rol->create($request->all());
        return redirect()->route('roles');
    }
    public function editar(Role $role){
        return view('roles/editarRol',compact('role'));
    }
    public function actualizar(Request $request,Role $role){
        $this->validate(request(), [
            'nombre_rol' => ['required','regex:/^[\pL\s]+$/u'],
            'privilegios'=> ['required','not_in:seleccione una opcion']
        ]);
        if($request->ajax()){
            return response()->json([
                'mensaje'=>'Rol modificado correctamente'
            ]);
        }
        $role->update($_REQUEST);
        return redirect()->route('roles');
    }
    public function eliminar(Request $request,Role $role){
        if($role->users->toArray() != []){ //para no eliminar un rol que tiene usuarios
            if($request->ajax()){
                return response()->json([
                    'eliminado'=>false,
                    'mensaje'=>'no se puede eliminar el rol porque hay
                    usuarios con este rol'
                ]);
            }
            return back()->withErrors('no se puede eliminar el rol porque hay
            usuarios con este rol');
        } else{
            $role->delete();
            if($request->ajax())
           {
                return response()->json([
                    'eliminado'=>true,
                    'mensaje'=>'Rol se elimino correctamente'
                ]);
            }
            return redirect()->route('roles');
        }
    }
}
