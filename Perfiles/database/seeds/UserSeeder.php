<?php

use App\Estudiante;
use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'id'=>1,
            'name'=>'admin',
            'user_name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin123'),  
        ]);
        $user->roles()->attach([1,2],['user_id'=>1]);
        $estudiante=Estudiante::create([
            'id'=>1,
            'nombres'=>'admin',
            'user_name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin123'),
            'telefono'=>'78945612',
            'carrera_id'=>1,
        ]);
        $user->estudiante()->attach($estudiante->id,['user_id'=>1]);

        //usser 2
        $user2=User::create([
            'id'=>2,
            'name'=>'admi2n',
            'user_name'=>'admin2',
            'email'=>'admin2@gmail.com',
            'password'=>bcrypt('admin123'),  
        ]);
        $user2->roles()->attach([2],['user_id'=>2]);
        $estudiante2=Estudiante::create([
            'id'=>2,
            'nombres'=>'admin2',
            'user_name'=>'admin2',
            'email'=>'admin2@gmail.com',
            'password'=>bcrypt('admin123'),
            'telefono'=>'78945618',
            'carrera_id'=>1,
        ]);
        $user2->estudiante()->attach($estudiante2->id,['user_id'=>2]);
        
    }
}
