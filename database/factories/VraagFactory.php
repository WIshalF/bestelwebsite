<?php

use Faker\Generator as Faker;

$factory->define(App\Vraag::class, function (Faker $faker) {
    return [
        'naam' => $faker->name,
        'achternaam' => $faker->name,
        'vraag' => $faker->paragraph,

    ];
});
