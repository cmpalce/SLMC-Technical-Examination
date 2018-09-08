<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'catchPhrase' => $faker->sentence,
        'bs' => $faker->word . ' ' . $faker->word . ' ' . $faker->word,
    ];
});
