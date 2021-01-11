<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Model\Pemesan;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Pemesan::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('password'),
    ];
});
