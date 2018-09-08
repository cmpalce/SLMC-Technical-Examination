<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->username,
        'email' => $faker->unique()->safeEmail,
        'addressId' => function() use ($faker) {
            return factory(App\Address::class)->create();
        },
    ];
});
