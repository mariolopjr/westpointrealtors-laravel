<?php

use Illuminate\Database\Seeder;
use App\Property;

use Faker\Factory as Faker;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::truncate();
        factory(Property::class, 1000)->create()->each(function($property) {
            $faker = Faker::create();
            $path = 'public/storage/images' . $faker->image($dir = public_path('storage/images'), $width = 640, $height = 480, 'city', false);
            $property
                ->addMedia($path)
                ->toMediaCollection();
        });
    }
}
