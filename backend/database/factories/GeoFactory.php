<?php

use Faker\Generator as Faker;

$factory->define(App\Geo::class, function (Faker $faker) {
    return [
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
    ];
});
