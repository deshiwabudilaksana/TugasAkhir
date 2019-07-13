<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\SubKategori;

class SubKategoriSeeder extends Seeder
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

        for($i = 1; $i <= 10; $i++){
            $sub_kategori = SubKategori::create([
                
            ]);
        }
    }
}
