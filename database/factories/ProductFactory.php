<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;


$factory->define(Product::class, function (Faker $faker) {
    static $count = 1;
    return [
        'imagePath' => sprintf("./picture/%02d.jpg",$count++),
        'title'=>str_random(10),
        'description'=>str_random(50),
        'price' => rand(1,300)
    ];
});
