<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grocer;

class GrocesrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //php artisan db:seed  --class=GrocesrSeeder
    public function run()
    {
        $data = [
            [
            'owner_full_name' => 'Florentina Tomás Esteban',
            'phone' => '7778822338',
            'grocer_name' => 'Tienda A',
            'address' => 'Calle nueva rusia',
            'zip_code' => 'Admin',
            ],
            [
                'owner_full_name' => 'Marc Noriega Paniagua',
                'phone' => '7771252565',
                'grocer_name' => 'Tienda B',
                'address' => 'Calle nueva francia',
                'zip_code' => 'Admin',
            ],
            [
                'owner_full_name' => 'Rosario Anastasia Amigó Mayol',
                'phone' => '777022125',
                'grocer_name' => 'Tienda C',
                'address' => 'Calle nueva Belgica',
                'zip_code' => 'Admin',
            ],
            [
                'owner_full_name' => 'Geraldo del Sevillano',
                'phone' => '777022008',
                'grocer_name' => 'Tienda D',
                'address' => 'Calle nueva China',
                'zip_code' => 'Admin',
            ]
        ];

        Grocer::insert($data);
    }
}
