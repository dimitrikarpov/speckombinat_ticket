<?php

use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {
    return [
        'raised' => $faker->name,
        'phone' => $faker->e164PhoneNumber,
        'description' => $faker->sentence,
        'priority' => $faker->randomElement($array = array ('low','normal','hight', 'very hight')),
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'status' => $faker->randomElement($array = array('new', 'open', 'awaiting', 'in progress', 'closed', 'solved')),
        'notes' => $faker->sentence
    ];
});
