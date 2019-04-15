<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Category::class, function (Faker $faker) {
    return [
        'category_name'=>$faker->unique()->name,
        'slug'=> Str::slug($faker->unique()->name, '-'),
        

    ];
});
