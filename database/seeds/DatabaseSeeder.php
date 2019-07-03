<?php

use Illuminate\Database\Seeder;
use App\detail_kategori_kado;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\detail_kategori_kado::class,15)->create();
    }
}
