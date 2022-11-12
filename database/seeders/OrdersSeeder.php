<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //php artisan db:seed  --class=OrdersSeeder
    public function run()
    {
        $data = 
        [
            [
                'received_by' => '3',
                'total_order_amount' => '2000.00',
            ],
            [
                'received_by' => '3',
                'total_order_amount' => '900.00',
            ],
            [
                'received_by' => '3',
                'total_order_amount' => '1500.00',
            ],
            [
                'received_by' => '3',
                'total_order_amount' => '4000.00',
            ]
        ];

        Order::insert($data);
        
    }
}
