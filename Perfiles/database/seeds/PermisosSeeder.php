<?php

use App\Permiso;
use Illuminate\Database\Seeder;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permiso::create([
            'id'=>1,
            'name'=>'areas',
        ]);
        Permiso::create([
            'id'=>2,
            'name'=>'users',
        ]);
        Permiso::create([
            'id'=>3,
            'name'=>'roles',
        ]);
        Permiso::create([
            'id'=>4,
            'name'=>'profesionales',
        ]);
        Permiso::create([
            'id'=>5,
            'name'=>'docentes',
        ]);
        Permiso::create([
            'id'=>6,
            'name'=>'carreras',
        ]);
        Permiso::create([
            'id'=>7,
            'name'=>'modalidades',
        ]);
        Permiso::create([
            'id'=>8,
            'name'=>'estudiantes',
        ]);
        Permiso::create([
            'id'=>9,
            'name'=>'registrar_perfil',
        ]);
        Permiso::create([
            'id'=>10,
            'name'=>'editar_perfil',
        ]);
        Permiso::create([
            'id'=>11,
            'name'=>'eliminar_perfil',
        ]);
    }
}
