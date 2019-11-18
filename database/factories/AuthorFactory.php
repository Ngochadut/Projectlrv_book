<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name, //goi du lieu tu thu vien fake
        'address' => $faker->name,
        'describes' => $faker->name, 
        'born' => now(),
        'died' => now(),
        'create_by' => 'admin',
        'update_by' => 'admin',
    ];
});
