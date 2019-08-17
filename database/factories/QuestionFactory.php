<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'file_id' => $faker->numberBetween(1, 3),
        'question_type' => 'text',
        'content_suggest' => $faker->text(200),
        'content' => $faker->text(200),
        'code' => $faker->languageCode,
    ];
});
