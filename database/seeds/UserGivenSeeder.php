<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\UserGiven;


class UserGivenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 50; $i++){
            $user_given = UserGiven::create([
                'id_user' => $faker->numberBetween(1,5),
                'nama_given' => $faker->name,
                'umur' => $faker->numberBetween(10, 50),
                'alamat' => $faker->address,
            ]);
        }
    }
}
