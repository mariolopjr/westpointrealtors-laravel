<?php

use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
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
        $directories = Storage::disk('images')->directories();

        foreach ($directories as $directory) {
            Storage::disk('images')->deleteDirectory($directory);
        }

        Property::truncate();

        factory(Property::class, 15)->create()->each(function($property) {
            $faker = Faker::create();

            $index = $faker->numberBetween(1, 6);

            for ($i = 0; $i < $index; $i++) {
                $image = $faker->image('public/uploads', 640, 480, 'city', false);
                $file = new UploadedFile(base_path('public/uploads/') . $image, $image);
                $property
                    ->addMedia($file)
                    ->toMediaCollection('images', 'images');
            }
        });
    }
}
