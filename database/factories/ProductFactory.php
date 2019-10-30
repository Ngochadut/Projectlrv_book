<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categories;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $ids = Categories::pluck('id');
    return [
        'category_id' => $faker->randomElement($ids),
        'name' => $faker->name, //goi du lieu tu thu vien fake
        'describes' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true), 
        'publisher' => $faker->name,
        'author' => $faker->name, 
        'price' => rand(1000000,2000000),
        'maket_price' => rand(1000000,2000000),
        'cover_type' => $faker->name,
        'num_page' => rand(1,1000), 
        'SKU' => $faker->name,
        'size' => rand(1,2),
        'number' => rand(1,1000),
        'create_by' => 'admin',
        'update_by' => 'admin',
    ];
});
