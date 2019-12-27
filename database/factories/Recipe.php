<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Recipe::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(1),
        'preparation' => $faker->paragraph,
        'notes' => $faker->paragraph,
        'recipe_class_id' => function () {
            return factory(\App\RecipeClass::class)->create()->id;
        },
    ];
});
