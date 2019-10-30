<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categories;
use App\Parent_category;
use Faker\Generator as Faker;

$factory->define(Categories::class, function (Faker $faker) {

    $ids = Parent_category::pluck('id');
    
    return [
        'parent_id' => $faker->randomElement($ids),
        'name' => $faker->name,
        'describes' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'create_by' => 'admin',
        'update_by' => 'admin'
    ];
});
