<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Users;
use Faker\Generator as Faker;

$factory->define(Users::class, function (Faker $faker) {
    return [
        'name' => $faker->name, //goi du lieu tu thu vien fake
        'phone' => $faker->phoneNumber, 
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName, 
        'address' => $faker->address,  
        'active' => rand(1,40), 
        'email' => $faker->unique()->email,
        'email_verified_at' => now(),
        'password' => bcrypt('12345'), // password
        'remember_token' => Str::random(10
    ),
        'create_by' => 'admin',
        'update_by' => 'admin'
    ];
});
