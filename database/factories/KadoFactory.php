<?php

use Faker\Generator as Faker;
use App\seller;
use App\kado;
use App\kategori_kado;

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

// $factory->define(App\kado::class, function (Faker $faker) {
//     return [
//         'nama_kado' => $faker->name,
//         'harga_kado' => $faker->numberBetween('5000', '200000'),
//         'id_seller' => function()
//         {
//             return seller::all()->random();
//         },
//         'deskripsi' => $faker->text
//     ];
// });
$factory->define(App\detail_kategori_kado::class, function (Faker $faker) {
    return [
        'id_kategori' => function()
        {
            return kategori_kado::all()->random();
        },
        'id_kado' => function()
        {
            return kado::all()->random();
        }
    ];
});