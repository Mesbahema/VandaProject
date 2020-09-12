<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\Modules\Product\Entities\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'cost' => rand(0, 1000)
    ];
});
