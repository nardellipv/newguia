<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Characteristic;
use Faker\Generator as Faker;

$factory->define(Characteristic::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'photo' => $faker->imageUrl($width = 100, $height = 50),
    ];
});
