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
            OrdersSeeder::class,
            ProductsSeeder::class,
            GrocesrSeeder::class, 
            OrderDetailSeeder::class,
            VisitsSeeder::class,
            ObservationsSeeder::class,
            EvidencesSeeder::class,

        ]);    
    }
}
