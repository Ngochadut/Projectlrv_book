<?php

use App\Author;
use App\Categories;
use App\Parent_category;
use App\Product;
use App\Users;
use Illuminate\Database\Seeder;

class DatabaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Parent_category::class,2)->create();
        factory(Categories::class,20)->create();
        factory(Author::class,50)->create();
        factory(Product::class,500)->create();
        factory(Users::class,50)->create();
    }
}
