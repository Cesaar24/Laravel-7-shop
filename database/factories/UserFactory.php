<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Categorie;
use App\Order;
use App\Orderproduct;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
// leer libreria faker
$factory->define(Product::class, function (Faker $faker) {
	
    return [
        'tittle' => $faker->text(25),
        'description' => $faker->sentence,
        'pic' => 'default.png',
        'price' => $faker->randomFloat(2,1,300),
        'categorie' => $faker->numberBetween(1,100),
        'quantity' => $faker->numberBetween(1,100),
    ];
});

$factory->define(Categorie::class, function (Faker $faker) {
	
    return [
        'Name' => Str::random(10),
        'category_id' => $faker->boolean(50) ? $faker->numberBetween(1,100) : null,
    ];
});




$factory->define(Order::class, function (Faker $faker) {
    
    return [
        'Name' => $faker->firstName(),
        'Lastname' => $faker->firstName(),
        'Cedula' => (string)$faker->numberBetween(1000000,100000000),
        'Estado' => $faker->state(),
        'city' => $faker->city(),
        'phone' => $faker->phoneNumber(),
        'email' => Str::random(10).'@gmail.com',
        'delivery' =>  $faker->boolean(50) ? 'Retiro en tienda' : 'Envio a ..',
        'payment' =>  $faker->boolean(50) ? 'Pago en tienda' : 'transferencia bancaria',
    ];
});

$factory->define(Orderproduct::class, function (Faker $faker) {
    
    return [
        'id_order' => $faker->numberBetween(1,100),
        'id_product' => $faker->numberBetween(1,100),
        'quantity'=> (string)$faker->numberBetween(1,10)
    ];
});

