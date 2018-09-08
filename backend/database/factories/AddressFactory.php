<?php

use Faker\Generator as Faker;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
        'street' => $faker->streetAddress,
        'suite' => $faker->buildingNumber,
        'city' => $faker->city,
        'zipcode' => $faker->postcode,
        'geoId' => function() use ($faker) {
            return factory(App\Geo::class)->create();
        },
    ];
});
