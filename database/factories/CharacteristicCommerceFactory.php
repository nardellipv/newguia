<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Characteristic_commerce;
use Faker\Generator as Faker;

$factory->define(Characteristic_commerce::class, function (Faker $faker) {
    return [
        'characteristic_id' => rand(1, 8),
        'commerce_id' => rand(1, 10),
    ];
});
