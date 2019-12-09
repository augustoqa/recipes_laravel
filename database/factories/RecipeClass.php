<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RecipeClass;
use Faker\Generator as Faker;

$factory->define(RecipeClass::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence(1),
    ];
});
