<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FieldValue;
use Faker\Generator as Faker;

$factory->define(FieldValue::class, function (Faker $faker) {

    return [
        'field_id' => factory(\App\Field::class)->create()->id,
        'name' => $faker->word
    ];
});
