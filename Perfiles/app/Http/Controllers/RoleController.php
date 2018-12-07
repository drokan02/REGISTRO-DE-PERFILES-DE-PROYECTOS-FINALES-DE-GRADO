<?php

namespace App\Http\Controllers;

use App\Permiso;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    function __construct(){
       // $this->middleware('auth');
        //$this->middleware(['verificarCuenta']);
        $this->middleware('permisos:roles');
    }
    public function index(Request $request){
        $buscar = $request->get('buscar');
        $roles=Role::name($buscar)
                    ->paginate(20);
        if($request->ajax()){
            return response()->json(
                view('parcial.roles',compact('roles','buscar'))->render()
            );
        }
        return view('roles/listaRoles',compact('roles','buscar'));
    }
    public function crear(){
        $permisos=Permiso::all()->pluck('name','id');
        return view('roles/crearRoles',compact('permisos'));
    }
    public function guardar(Request $request){
        $this->validate(request(), [
            'nombre_rol' => ['required','regex:/^[\pL\s]+$/u'],
            'privilegios'=> ['required','not_in:seleccione una opcion'],
            'permisos'=>'required'
        ]);

        if($request->ajax()){
            return response()->json([
                'mensaje'=>'Rol registrado correctamente'
            ]);
        }
        DB::transaction(function () use($request) {
            $rol=new Role();
            $rol->create($request->all());
            $idrol=role::query()->where('nombre_rol',$request['nombre_rol'])->value('id');
            $rol->permisos()->attach($request['permisos'],['role_id'=>$idrol]);
        });
        return redirect()->route('roles');
    }
    public function editar(Role $role){
        $permisos=Permiso::all()->pluck('name','id');
        return view('roles/editarRol',compact('role','permisos'));
    }
    public function actualizar(Request $request,Role $role){
        $this->validate(request(), [
            'nombre_rol' => ['required','regex:/^[\pL\s]+$/u'],
            'privilegios'=> ['required','not_in:seleccione una opcion'],
            'permisos'=>'required'
        ]);
        if($request->ajax()){
            return response()->json([
                'mensaje'=>'Rol modificado correctamente'
            ]);
        }

        DB::transaction(function () use($request,$role) {
            $role->update($request->all());
            $idrol=role::query()->where('nombre_rol',$request['nombre_rol'])->value('id');
            $role->permisos()->sync($request['permisos'],['role_id'=>$idrol]);
            $users=$role->users()->get();
          //  dd($users);
            foreach ($users as $user){
               // dd($user);
                $user->permisosUser()->sync($request['permisos'],['user_id'=>$user->id]);
            }
        });
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
            $role->permisos()->detach();
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
