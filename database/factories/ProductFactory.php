<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'category_id' => Category::all()->random()->id,    // obtiene el uuid de cada categoria
        'name' => $faker->word,
        'price' => $faker->randomFloat(3,0,1000),
        'photo' => $faker->imageUrl(),
        'stock' => $faker->randomNumber(3),
    ];
});
