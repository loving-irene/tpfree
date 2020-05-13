<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=app(Faker\Generator::class);

        $images=factory(\App\Models\Image::class)->times(10)->make();

        \App\Models\Image::insert($images->toArray());
    }
}
