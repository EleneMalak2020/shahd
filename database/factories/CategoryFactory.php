<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name_en'      => $faker->name(),
        'name_ar'      => $faker->name(),
        'image'         => 'https://source.unsplash.com/random'
    ];
});
