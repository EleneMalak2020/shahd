<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => 1,
        'name_en' => $faker->words(3, true),
        'name_ar' => $faker->words(3, true),
        'price' => $faker->randomFloat(2, 10, 100),
        'description_en' => $faker->realText(200),
        'description_ar' => $faker->realText(200),
        'image'=>   'https://source.unsplash.com/random',
    ];
});
