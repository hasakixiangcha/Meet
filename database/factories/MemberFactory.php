<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Members::class, function (Faker $faker) {
    static $password='abc123';
    return [
        //
        'nickname'=>$faker->name,
        'account'=>$faker->unique()->phoneNumber,
        'sex'=>$faker->numberBetween(0,2),
        'password' => bcrypt('secret'),
        'avator'=>$faker->numberBetween(2,21),
        'monologue'=>$faker->paragraph(3),
        'last_login_time'=>$faker->dateTime('now'),
        'balance'=>$faker->numberBetween(0,200000)
    ];
});


