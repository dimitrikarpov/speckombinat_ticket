<?php

use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {

    // users id's list
    static $uidList;

    if (! $uidList) {
        if (App\User::all()->isEmpty()) {
            for($i = 0; $i < 10; $i++) {
                $uidList[] = factory('App\User')->create()->id;
            }
        } else {
            $currentUsers = App\User::all();
            foreach($currentUsers as $user) {
                $uidList[] = $user->id;
            }
        }
    }

    $status = $faker->randomElement(['new', 'open', 'awaiting', 'in progress', 'closed', 'solved']);
    $user_id = $status == 'new' ? null : $faker->randomElement($uidList);
    $created_at = $faker->dateTimeThisMonth();
    $updated_at = $faker->dateTimeBetween($created_at);

    return [
        'raised' => $faker->name,
        'phone' => $faker->e164PhoneNumber,
        'description' => $faker->sentence,
        'priority' => $faker->randomElement(['low','normal','hight', 'very hight']),
        'user_id' => $user_id,
        'status' => $status,
        'notes' => $faker->sentence,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
