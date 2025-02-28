<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Fornecedor;
use Faker\Generator as Faker;

$factory->define(Fornecedor::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'site' => $faker->url,
        'uf' => $faker->stateAbbr,
        'email' => $faker->unique()->email,
    ];
});
