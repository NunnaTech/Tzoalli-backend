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
                'order_date' => '2022-10-01',
                'delivery_date' => '2022-10-03',
                'quantity' => '10',
                'grocer_id' => '1',
                'user_id' => '1',
            ],
            [
                'order_date' => '2022-10-01',
                'delivery_date' => '2022-10-03',
                'quantity' => '20',
                'grocer_id' => '1',
                'user_id' => '1',
            ],
            [
                'order_date' => '2022-10-01',
                'delivery_date' => '2022-10-03',
                'quantity' => '10',
                'grocer_id' => '2',
                'user_id' => '2',
            ],
            [
                'order_date' => '2022-10-01',
                'delivery_date' => '2022-10-03',
                'quantity' => '10',
                'grocer_id' => '2',
                'user_id' => '2',
            ]
        ];

        Order::insert($data);
        
    }
}
