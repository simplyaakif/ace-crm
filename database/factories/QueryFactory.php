<?php

    /* @var $factory \Illuminate\Database\Eloquent\Factory */

    use App\Model;
    use Faker\Generator as Faker;

    $factory->define(\App\Queries::class, function (Faker $faker) {
        return [
            'q_name' => $faker->name,
            'q_email' => $faker->unique()->safeEmail,
            'q_contact' => $faker->phoneNumber,
            'q_address' => $faker->address,
            'q_interaction_type' => 'On Campus Visit',
            'created_at'=>$faker->dateTimeBetween('-3 months','9 months')
        ];
    });
