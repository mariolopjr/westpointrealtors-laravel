<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Building::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(10, true),
        'type' => $faker->numberBetween(1, 3),
        'address' => $faker->address,
        'status' => $faker->numberBetween(1, 5),
        'price' => $faker->randomFloat(2, 1000, 9999999),
        'description' => $faker->paragraphs(5, true),
        'home_size' => $faker->randomFloat(2, 100, 99999),
        'lot_size' => $faker->randomFloat(2, 200, 999999),
        'bedrooms' => $faker->numberBetween(1, 30),
        'bathrooms' => $faker->numberBetween(1, 20),
        'garages' => $faker->numberBetween(0, 10),
        'year' => $faker->date('Y-m-d'),
        'hoa_fees' => $faker->randomFloat(2, 0, 100000),
        'rental' => $faker->boolean(20),
        'favorite' => $faker->boolean(10),
        'active' => $faker->boolean(67),
        'user_id' => $faker->randomNumber(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
    ];
});
