<?php

use Illuminate\Database\Seeder;
use App\Area;
class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'nombre' => 'Base de Datos',
            'codigo' => 'base12'
        ]);

        Area::create([
            'nombre' => 'Comercio Electronico',
            'codigo' => 'comer01'
        ]);

        Area::create([
            'nombre' => 'Computación Grafica',
            'codigo' => 'compuG1'
        ]);

        Area::create([
            'nombre' => 'Evaluacion y Auditoria de Sistemas',
            'codigo' => 'eas1'
        ]);

        Area::create([
            'nombre' => 'Ingenieria de Produccion',
            'codigo' => 'ingP12'
        ]);

        Area::create([
            'nombre' => 'Ingenieria de Software',
            'codigo' => 'ing12'
        ]);

    }
}
