<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment_commerce;
use Faker\Generator as Faker;

$factory->define(Payment_commerce::class, function (Faker $faker) {
    return [
        'commerce_id' => rand(1, 10),
        'payment_id' => rand(1, 8),
    ];
});
