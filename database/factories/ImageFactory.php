<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Image;

$factory->define(Image::class, function (Faker $faker) {
    $date=$faker->date().' '.$faker->time();
    $path_arrs=[
        '/upload/images/202005/13/1.png',
        '/upload/images/202005/13/2.png',
        '/upload/images/202005/13/3.png',
    ];
    $nums=[11,12,13];
    $path=$faker->randomElement($path_arrs);
    return [
        'absolute_path'=>public_path().$path,
        'relative_path'=>$path,
        'title'=>$faker->title(),
        'tag'=>$faker->randomElement($nums),
        'created_at'=>$date,
        'updated_at'=>$date
    ];
});
