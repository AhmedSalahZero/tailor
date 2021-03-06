<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$name = $faker->unique()->name ,
        'description'=>$faker->sentence(5),
        'slug'=>Str::slug($name) ,
        'price'=>600
    ];
});
