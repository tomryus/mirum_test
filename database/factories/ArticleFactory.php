<?php

use Faker\Generator as Faker;
use App\Model\Category;
use Illuminate\Support\Str;

$factory->define(App\Model\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'slug'  => str_slug($faker->name,'-'),
        'image' => $faker->word,
        'thumbnail' => $faker->word,
        'content' => $faker->text,
        'short_description' =>$faker->word,
        'category_id' =>function(){
           return Category::all()->random();
        }
              
    ];
});
