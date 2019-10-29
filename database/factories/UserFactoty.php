<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name, //goi du lieu tu thu vien fake
        'phone' => $faker->phoneNumber, 
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName, 
        'address' => $faker->address,  
        'active' => $faker->active, 
        'email' => $faker->unique()->email,
        'email_verified_at' => now(),
        'password' => bcrypt('12345'), // password
        'remember_token' => Str::random(10),
        'create_by' => $faker->create_by,
        'update_by' => $faker->update_by,
        'delete_flag' => $faker->delete_flag,
    ];
});
