<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' =>  $faker->paragraph($nbSentences = 150, $variableNbSentences = true),
        'price' => $faker->numberBetween($min = 10, $max = 500),
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'category_id' => rand(1, 5),
        'commerce_id' => rand(1, 5),
    ];
});
