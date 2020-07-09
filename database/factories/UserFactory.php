<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Listing::class, function (Faker $faker) {
    $homeType = ['Apartment', 'House'];
    $roomType = ['Entire Room', 'Private', 'Shared'];
    $accomodation = ['1', '2', '3', '4+'];
    $bedroom = ['1', '2', '3', '4+'];
    $bathroom = ['1', '2', '3', '4+'];

    return [
        'home_type' => $homeType[rand(0, count($homeType) - 1)],
        'room_type' => $roomType[rand(0, count($roomType) - 1)],
        'accommodate' => $accomodation[rand(0, count($accomodation) - 1)],
        'bedroom' => $bedroom[rand(0, count($bedroom) - 1)],
        'bathroom' => $bathroom[rand(0, count($bathroom) - 1)],
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
        'name' => $faker->company,
        'summary' => $faker->text($maxNbChars = 200),
        'tv' => $faker->boolean(), //bool
        'kitchen' => $faker->boolean(), //bool
        'internet' => $faker->boolean(), //bool
        'heating' => $faker->boolean(), //bool
        'airconditioning' => $faker->boolean(), //bool
        'address' => $faker->address,
        'user_id' => rand(1, App\User::all()->count()),
    ];
});
