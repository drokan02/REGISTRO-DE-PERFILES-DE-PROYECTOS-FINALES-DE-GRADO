<?php

use Illuminate\Database\Seeder;
use App\docentes;
class docenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(docentes::class,2)->create();
    }
}
