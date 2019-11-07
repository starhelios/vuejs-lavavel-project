<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LineItem;
use Faker\Generator as Faker;

$factory->define(LineItem::class, function (Faker $faker) {
    return [
        'campaign_id' => factory(\App\Campaign::class)->create()->id
    ];
});
