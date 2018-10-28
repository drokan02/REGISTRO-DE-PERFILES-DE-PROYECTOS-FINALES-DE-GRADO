<?php

use Illuminate\Database\Seeder;
use App\CargaHoraria;
class CargahorariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CargaHoraria::create([
            'carga_horaria' => 'Parcia',
        ]);

        CargaHoraria::create([
            'carga_horaria' => 'Tiempo Completo',
        ]);

    }
}
