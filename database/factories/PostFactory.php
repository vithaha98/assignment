<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Posts;

use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'content' => $faker->paragraph(5),
    ];
});
