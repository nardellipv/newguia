<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Commerce;
use Faker\Generator as Faker;

$factory->define(Commerce::class, function (Faker $faker) {
    $title = $faker->unique()->word(10);
    
    return [
        'name' => $title,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'phoneWsp' => '2615965966',
        'web' => $faker->url,
        'about' => $faker->text($maxNbChars = 500),
        'votes_positive' => rand(0, 100),
        'visit' => rand(0, 100),
        'facebook' => 'https://www.facebook.com/celiacosmendozaOK',
        'instagram' => 'https://www.instagram.com/celiacosmendoza/',
        'logo' => '',
        'type' => $faker->randomElement($array = array('FREE','BASIC','CLASIC','PREMIUM')),
        'slug' => $title,
        'status' => $faker->randomElement($array = array('ACTIVE', 'DESACTIVE')),
        'user_id' => rand(1, 5),
        'province_id' => 2,
        'region_id' => 6,
    ];
});
