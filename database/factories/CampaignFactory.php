<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Campaign;
use Faker\Generator as Faker;

$factory->define(Campaign::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'agency_id' => factory(\App\Agency::clasS)->create()->id,
        'country_id' => factory(\App\Country::class)->create()->id
    ];
});
