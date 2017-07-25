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
            //Storage::fake('media');
            //$property
            //    ->addMedia(UploadedFile::fake()->image('test1.jpg'))
            //    ->toMediaCollection();
        });
    }
}
