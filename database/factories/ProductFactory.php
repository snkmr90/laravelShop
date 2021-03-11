<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $fakerName = $faker->name;
    $fakerSlug =Str::slug($fakerName);
    return [
        'product_name' => $fakerName,
        'product_description' => $faker->text,
        'product_slug' => $fakerSlug,
        'product_stock' => rand(10,100),
        'product_price' => rand(10,100),
        'product_image' => 'https://source.unsplash.com/random',
    ];
});
