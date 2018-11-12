<?php

use Illuminate\Database\Seeder;
use App\Titulo;
class TituloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Titulo::create([
            'abreviatura' => 'Ing.',
            'nombre'      =>  'Ingeniero(ra)'
        ]);

        Titulo::create([
            'abreviatura' => 'Doc.',
            'nombre'      =>  'Doctor(a)'
        ]);

        Titulo::create([
            'abreviatura' => 'Arq.',
            'nombre'      =>  'Arquitecto'
        ]);

        Titulo::create([
            'abreviatura' => 'Lic.',
            'nombre'      =>  'Licenciado(da)'
        ]);

        Titulo::create([
            'abreviatura' => 'Msc.',
            'nombre'      =>  'Maestria'
        ]);

        Titulo::create([
            'abreviatura' => 'Msc. Lic.',
            'nombre'      =>  'Maestria en Licenciatura'
        ]);

        Titulo::create([
            'abreviatura' => 'Msc. Ing.',
            'nombre'      =>  'Maestria en Ingenieria'
        ]);
    }
}
