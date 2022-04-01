<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(\Database\Seeds\DzialyTableSeeder::class);
       /* $this->call(\Database\Seeders\DzialyTableSeeder::class);*/
    }
}
