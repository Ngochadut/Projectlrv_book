<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Parent_category;
use Faker\Generator as Faker;

$factory->define(Parent_category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'create_by' => 'admin',
        'update_by' => 'admin'
    ];
});
