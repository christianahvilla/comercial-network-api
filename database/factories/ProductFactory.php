<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Category;
use App\Models\Shop;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'category_id' => Category::all()->random()->id,    // get a category id from table categories
        'shop_id' => Shop::all()->random()->id,    // get a category id from table categories
        'name' => $faker->word,
        'price' => $faker->randomFloat(3,0,1000),
        'image' => $faker->imageUrl(),
        'stock' => $faker->randomNumber(3),
    ];
});
