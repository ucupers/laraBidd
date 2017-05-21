<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Carbon\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(auctionTime\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(auctionTime\Product::class, function (Faker\Generator $faker) {

    return [
        'user_id' => rand(1,15),
        'title' => $faker->sentence(),
        'description' => $faker->paragraph,
        'imgUrl' => 'https://4.bp.blogspot.com/-JFud0TuYv2Y/VpdkV9WyKFI/AAAAAAAAAPM/GZZcbVk-Alk/s1600/froots.jpg',
        'minBid' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 100),
        'instantPurchasePrice' =>  $faker->randomFloat($nbMaxDecimals = 3, $min = 101, $max = 500),
        'duration'=> Carbon::tomorrow(+1),
        'active' => $faker->boolean,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});

