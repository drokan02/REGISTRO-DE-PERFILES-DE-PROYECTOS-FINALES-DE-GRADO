<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\docentes::class, function (Faker\Generator $faker) {
   
            
    return [
        'nombre' => $faker->sentence(4),
        'apell_paterno' => $faker->sentence(3),
        'apell_materno' => $faker->sentence(3),
        'ci' => $faker->sentence(3),
        'correo' => $faker->sentence(3),
        'carrera' => $faker->sentence(3),
        'area' => $faker->sentence(3),
        'remember_token' => str_random(10),
    ];
});