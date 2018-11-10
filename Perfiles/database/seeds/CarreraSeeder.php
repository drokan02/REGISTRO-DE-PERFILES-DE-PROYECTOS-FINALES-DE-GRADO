<?php

use Illuminate\Database\Seeder;
use App\Carrera;
class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carrera::create([
            'id'=>1,
            'codigo_carrera' => 'inf-545',
            'nombre_carrera' => 'LIC. informática'
        ]);

        Carrera::create([
            'id'=>2,
            'codigo_carrera' => 'sis-6525',
            'nombre_carrera' => 'Ing. sistemas'
        ]);

        Carrera::create([
            'id'=>3,
            'codigo_carrera' => 'ind-3221',
            'nombre_carrera' => 'Ing. Industrial'
        ]);
    }
}
