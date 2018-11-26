<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1=Role::create([
            'id'=> 1,
            'nombre_rol'=>'administrador',
            'privilegios'=>'SuperUsuario'
        ]);
        $r1->permisos()->attach(1,['role_id'=>1]);
        $r2=Role::create([
            'id'=> 2,
            'nombre_rol'=>'estudiante',
            'privilegios'=>'Usuario Normal'
        ]);
        $r2->permisos()->attach(9,['role_id'=>2]);
        $r3=Role::create([
            'id'=> 3,
            'nombre_rol'=>'docente',
            'privilegios'=>'Usuario Normal'
        ]);
        $r3->permisos()->attach([1,6,7],['role_id'=>3]);
    }
}
