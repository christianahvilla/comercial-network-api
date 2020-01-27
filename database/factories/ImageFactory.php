<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Image;
use App\Models\Shop;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'shop_id' => Shop::all()->random()->id,    // get a category id from table categories
        'url' => $faker->imageUrl(),
    ];
});
