<?php

use Faker\Generator as Faker;
use App\Model\Category;
use Illuminate\Support\Str;

$factory->define(App\Model\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'slug'  => str_slug($faker->name,'-'),
        'image' => Null,
        'thumbnail' => Null,
        'content' => $faker->text,
        'short_description' =>$faker->word,
        'category_id' =>function(){
           return Category::all()->random();
        }
              
    ];
});
