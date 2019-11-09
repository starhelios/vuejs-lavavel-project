<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Field;
use Faker\Generator as Faker;

$factory->define(Field::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'label' => $faker->word,
        'taggable' => $faker->boolean,
        'global_available' => $faker->boolean,
        'field_entity' => $faker->randomElement([
                                                    'campaign',
                                                    'line_item',
                                                    'insertion_order',
                                                    'creative'
                                                ]),
    ];
});
