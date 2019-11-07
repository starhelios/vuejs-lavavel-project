<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'iso1' => $faker->countryCode,
        'iso2' => $faker->countryISOAlpha3,
        'name' => $faker->country,
    ];
});
