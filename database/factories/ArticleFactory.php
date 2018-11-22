<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->text(30),
        'content' => $faker->text(200),
        'featured' => $faker->boolean(0)
    ];
});
