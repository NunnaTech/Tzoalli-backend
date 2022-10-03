<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderDetail;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //php artisan db:seed  --class=OrderDetailSeeder
    public function run()
    {
        $data = [
            [
                'id_product' => '1',
                'quantity' => '10',
            ],
            [
                'id_product' => '2',
                'quantity' => '20',
            ],
            [
                'id_product' => '3',
                'quantity' => '30',
            ],
            [
                'id_product' => '4',
                'quantity' => '40',
            ]
        ];

        OrderDetail::insert($data);
    }
}
