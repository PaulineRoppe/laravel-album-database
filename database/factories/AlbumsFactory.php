<?php

use Faker\Generator as Faker;

$factory->define(App\Album::class, function (Faker $faker) {
    return [
        'albumCover' => $faker->name(),
        'artistName' => $faker->name(),
        'albumName' => $faker->name(),
        'genre' => $faker->name(),
        'productionYear' => $faker->year(),
        'label' => $faker->name(),
        'songsList' => $faker->text(),
        'note' => $faker->randomDigit()
    ];
});
