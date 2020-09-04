<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Courses::class, function (Faker $faker) {
    return [
        'c_title' => $faker->randomElement(['Spoken English', 'IELTS','Web Design','Web Development','Graphics Design']),
        'c_description' => $faker->text,
        'c_duration' => $faker->numberBetween(0,5) .' Months',
        'c_fee' => $faker->randomElement(['12500', '1500','18500','22500']),

    ];
});
