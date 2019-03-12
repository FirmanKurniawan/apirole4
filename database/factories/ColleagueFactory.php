<?php

use Faker\Generator as Faker;

$factory->define(\App\Colleague::class, function (Faker $faker) {
    $gender = $faker->randomElement($array = array ('male', 'female'));
    return [
        'first_name' => $faker->firstName($gender),
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone_number' => $faker->phoneNumber,
        'gender' => $gender,
        'speciality' => $faker->randomElement($array = array ('Programming', 'Design', 'Web Development', 'Photography', 'Animation')),
        'address' => $faker->address,
    ];
});
