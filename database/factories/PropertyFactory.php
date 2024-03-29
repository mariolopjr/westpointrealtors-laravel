<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Property::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(10, true),
        'type_id' => $faker->numberBetween(1, 4),
        'address' => $faker->address,
        'status_id' => $faker->numberBetween(1, 5),
        'price' => $faker->randomFloat(2, 1000, 9999999),
        'description' => $faker->paragraphs(5, true),
        'home_size' => $faker->randomFloat(2, 100, 99999),
        'lot_size' => $faker->randomFloat(2, 200, 999999),
        'bedrooms' => $faker->numberBetween(1, 30),
        'bathrooms' => $faker->numberBetween(1, 20),
        'garages' => $faker->numberBetween(0, 10),
        'year' => $faker->date('Y'),
        'hoa_fees' => $faker->randomFloat(2, 0, 100000),
        'rental' => $faker->boolean(20),
        'favorite' => $faker->boolean(10),
        'active' => $faker->boolean(67),
        'user_id' => $faker->numberBetween(1, 100),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
    ];
});
