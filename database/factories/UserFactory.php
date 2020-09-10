<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role' => 'candidate',
        'password' => Hash::make('candidatepassword'),
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\Candidatos::class, function (Faker $faker) {
    return [
        'cedula' => $faker->numerify('###########'),
        'telefono' => $faker->numerify('##########'),
        'salario_al_que_aspira' => $faker->numberBetween(10000,200000),
        'recomendado_por' => $faker->name,
    ];
});

$factory->define(\App\Puestos::class, function (Faker $faker) {
    return [
        'nombre' => $faker->jobTitle,
        'nivel_riesgo' => $faker->randomElement(['alto', 'medio', 'bajo']),
        'salario_minimo' => $faker->numberBetween(10000,50000),
        'salario_maximo' => $faker->numberBetween(50000,200000),
        'estado' => 'activo',
    ];
});

$factory->define(\App\ExperienciaLaboral::class, function (Faker $faker) {
    return [
        'empresa' => $faker->company,
        'fecha_desde' => $faker->dateTimeThisDecade(),
        'fecha_hasta' => $faker->dateTimeThisYear(),
        'salario' => $faker->numberBetween(10000,50000),
    ];
});

$factory->define(\App\Empleados::class, function (Faker $faker) {
    return [
        'fecha_ingreso' => $faker->dateTimeThisYear(),
        'estado' => 'activo'
    ];
});
