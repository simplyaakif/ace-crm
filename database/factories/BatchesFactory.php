<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Batches::class, function (Faker $faker) {
    return [
        'b_name'=> $faker->randomElement(['Spoken English', 'IELTS','Web Design','Web Development','Graphics Design']),
        'b_session_type'=> $faker->randomElement(['Regular', 'Weekend','Online']),
        'b_timings'=>$faker->time('h:i:sa','now'),
        'course_id'=>function (){
            return factory('App\Courses')->create()->id;
        },
        'b_startDate'=>$faker->date('Y-m-d','now'),
        'b_endDate'=>$faker->date('Y-m-d','3 months'),
        'b_strength'=> $faker->numberBetween(6,12),
        'created_at'=>$faker->dateTimeBetween('-10 months','now')
    ];
});
