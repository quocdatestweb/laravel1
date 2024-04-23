<?php
use App\Models\ProductCategory;
use Faker\Generator as Faker;

$factory->define(ProductCategory::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->randomNumber(),
        'name' => $faker->word,
        'description' => $faker->sentence,
        'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
        'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
    ];
});
