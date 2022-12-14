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
                'order_id' => '1',
                'product_id' => '1',
                'quantity' => '10',
                'total_amount' => '500.00',
            ],
            [
                'order_id' => '1',
                'product_id' => '2',
                'quantity' => '20',
                'total_amount' => '400.00',
            ],
            [
                'order_id' => '2',
                'product_id' => '3',
                'quantity' => '30',
                'total_amount' => '1500.00',
            ],
            [
                'order_id' => '2',
                'product_id' => '4',
                'quantity' => '40',
                'total_amount' => '1200.00',
            ],
            [
                'order_id' => '3',
                'product_id' => '5',
                'quantity' => '40',
                'total_amount' => '4000.00',
            ],
            [
                'order_id' => '3',
                'product_id' => '6',
                'quantity' => '40',
                'total_amount' => '2000.00',
            ],
            [
                'order_id' => '3',
                'product_id' => '7',
                'quantity' => '40',
                'total_amount' => '4800.00',
            ],
            [
                'order_id' => '4',
                'product_id' => '8',
                'quantity' => '40',
                'total_amount' => '600.00',
            ],
            [
                'order_id' => '4',
                'product_id' => '9',
                'quantity' => '40',
                'total_amount' => '600.00',
            ],
            [
                'order_id' => '5',
                'product_id' => '9',
                'quantity' => '10',
                'total_amount' => '500.00',
            ],
            [
                'order_id' => '5',
                'product_id' => '9',
                'quantity' => '20',
                'total_amount' => '400.00',
            ]
        ];

        OrderDetail::insert($data);
    }
}
