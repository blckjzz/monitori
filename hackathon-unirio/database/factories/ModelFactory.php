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
        'matricula' => $faker->randomNumber(9),
        'nome' => $faker->name,
        'nome_social' => $faker->randomNumber(2) < 20 ? $faker->name : '',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'email' => $faker->unique()->safeEmail,
        'telefone' => $faker->phoneNumber,
        'uni_coin' => $faker->randomNumber(3),
        'curso_id' => 1,
    ];
});