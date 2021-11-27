<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(\App\Models\Article::class, function(Faker $faker){
  return [
    'title' => $faker->sentence,
    'slug' => str_slug($faker->unique()->sentence),
    'articletype_id' => random_int(1,4),
    'short_description' => $faker->sentence,
    'description' => $faker->sentence,
    'main_image' => $faker->image('public/images/listing', 400, 250),
    'published' => 1,
    'homepage' => random_int(0,1),
    'exclusive' => random_int(0,1),
    'banner_image' => $faker->image('public/images/main', 1200, 300),

  ];
});
