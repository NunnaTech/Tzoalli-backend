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
            'grocer_name' => 'Tienda A',
            'address' => 'Calle nueva rusia',
            'zip_code' => 'Admin',
            ],
            [
                'grocer_name' => 'Tienda B',
                'address' => 'Calle nueva francia',
                'zip_code' => 'Admin',
            ],
            [
                'grocer_name' => 'Tienda C',
                'address' => 'Calle nueva Belgica',
                'zip_code' => 'Admin',
            ],
            [
                'grocer_name' => 'Tienda D',
                'address' => 'Calle nueva China',
                'zip_code' => 'Admin',
            ]
        ];

        Grocer::insert($data);
    }
}
