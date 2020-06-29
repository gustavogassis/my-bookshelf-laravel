<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'author' => $faker->name,
        'cover' => 'covers/123hjkh98da92',
        'description' => $faker->paragraph,
        'pages' => '322',
        'nacional' => 'S',
        'publisher' => 'Globo',
        'created_at' => now(),
        'updated_at' => now()
    ];
});
