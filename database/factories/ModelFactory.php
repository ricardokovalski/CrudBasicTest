<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Entities\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Entities\Lot::class, function (Faker\Generator $faker) {
    return [
        'code' => str_random(8),
    ];
});

$factory->define(App\Entities\Category::class, function (Faker\Generator $faker) {
	return [
		'description' => $faker->name,
		'lot_id' => $faker->numberBetween(1, 5),
	];
});

$factory->define(App\Entities\Product::class, function (Faker\Generator $faker) {
	return [
		'description' => $faker->sentence,
		'bar_code' => str_random(50),
		'price' => $faker->numberBetween(1, 100),
		'amount' => $faker->numberBetween(1, 10),
		'category_id' => $faker->numberBetween(1, 10),
	];
});
