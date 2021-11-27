<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Models\Article::class, function (Faker $faker) {
    return [
      'title' => $faker->sentence,
      'slug' => str_slug($faker->unique()->sentence),
      'articletype_id' => random_int(1,4),
    ];
});
