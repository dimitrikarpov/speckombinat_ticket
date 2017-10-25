<?php

use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {

    // users id's list
    static $uidList;
    // categories id's list
    static $cidList;

    if (! $uidList) {
        $users = App\User::all();
        if ($users->isEmpty()) {
            factory('App\User', 10)->create()->each(function ($u) use ($uidList) {
                $uidList[] = $u->id;
            });
        } else {
            foreach($users as $user) {
                $uidList[] = $user->id;
            }
        }
    }

    if (! $cidList) {
        $categories = App\Category::all();
        if ($categories->isEmpty()) {
            factory('App\Category', 10)->create()->each(function ($c) use ($cidList) {
                $cidList[] = $c->id;
            });
        } else {
            foreach($categories as $category) {
                $cidList[] = $category->id;
            }
        }
    }

    $status = $faker->randomElement(['new', 'in progress', 'awaiting', 'closed']);
    $user_id = $status == 'new' ? null : $faker->randomElement($uidList);
    $category_id = $faker->randomElement($cidList);
    $created_at = $faker->dateTimeThisMonth();
    $updated_at = $faker->dateTimeBetween($created_at);

    return [
        'raised' => $faker->name,
        'phone' => $faker->e164PhoneNumber,
        'description' => $faker->sentence,
        'priority' => $faker->randomElement(['low', 'normal', 'high']),
        'user_id' => $user_id,
        'category_id' => $category_id,
        'status' => $status,
        'notes' => $faker->sentence,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
