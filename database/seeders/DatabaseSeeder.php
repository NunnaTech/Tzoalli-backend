<?php

namespace Database\Seeders;

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
        $this->call([
            UserSeeder::class,
            ProductsSeeder::class,
            GrocesrSeeder::class,
            ObservationsSeeder::class,
            EvidencesSeeder::class,
            OrdersSeeder::class,
            OrderDetailSeeder::class,

        ]);    
    }
}
