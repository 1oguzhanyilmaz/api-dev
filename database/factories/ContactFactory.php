<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use App\User;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
//        'user_id' => factory(User::class),
        'user_id' => 1,
        'name' => $faker->name,
        'email' => $faker->email,
        'birthday' => '05/20/1995',
        'company' => $faker->company,
    ];
});
