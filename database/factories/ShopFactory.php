<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Shop;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    $faker->addProvider(new \KindProdiver($faker));

    return [
        'id' => $faker->uuid,
        'user_id' => User::all()->random()->id,    // get a category id from table categories
        'name' => $faker->company,
        'image' => $faker->imageUrl(),
        'email' => $faker->companyEmail,
        'phone' => $faker->phoneNumber,
        'web_page' => $faker->safeEmailDomain,
        'kind' => $faker->kind,
        'street' => $faker->streetName,
        'zip_code' => $faker->postcode,
        'neighborhood' => $faker->citySuffix,
        'city' => $faker->city,
        'long' => $faker->longitude($min = -101, $max = -101),
        'lat' => $faker->latitude($min = -90, $max = 90),
        'products_limit' => $faker->numberBetween($min = 1, $max = 200),
        'images_limit' => $faker->numberBetween($min = 1, $max = 200)
    ];
});
