<?php

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'mobile' => random_int(1111111111,9999999999),
        'email' => $faker->unique()->safeEmail,
        'referal_id' =>Str::random(10),
        'password' =>bcrypt(12345678),
        'image' =>'user/e10be345c0b773efb216c76f6629a11f.jpg',
        'address' =>Str::random(20),
        'bkash_no' =>random_int(1111111111,9999999999),
        'roll' =>'2',
        'verify' =>'1',
        'verify_token' =>null,
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
    ];
});
