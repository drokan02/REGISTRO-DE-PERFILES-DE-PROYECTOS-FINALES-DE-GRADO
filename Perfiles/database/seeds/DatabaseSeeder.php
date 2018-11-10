<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PermisosSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CarreraSeeder::class);
        $this->call(CargahorariaSeeder::class);
        $this->call(TituloSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(ModalidadSeeder::class);
        $this->call(UserSeeder::class);
    }
}
