<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Books;
use App\Categories;
use Faker\Generator as Faker;

$factory->define(Books::class, function (Faker $faker) {
    $ids = Categories::pluck('id');
    return [
        'name' => $faker->word . ' ' . $faker->numberBetween($min = 0, $max = 9999),
		'img' => '/images/default.jpg',
		'author' => $faker->name,
		'describes' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
		'price' => $faker->numberBetween($min = 1000, $max = 1000000),
        'category_id' => $faker->randomElement($ids),
        'number' => $faker->numberBetween($min = 0, $max = 100)
    ];
});
