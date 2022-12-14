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
                'received_by' => 'Bouchra Julian',
                'total_order_amount' => '900.00',
            ],
            [
                'received_by' => 'Antonio Miguel Maya',
                'total_order_amount' => '2700.00',
            ],
            [
                'received_by' => 'Xavier Palacio',
                'total_order_amount' => '10800.00',
            ],
            [
                'received_by' => 'Sergio Gracia',
                'total_order_amount' => '1200.00',
            ],
            [
                'received_by' => 'Said Cordon',
                'total_order_amount' => '450.00',
            ],
            [
                'received_by' => 'Jair Molina',
                'total_order_amount' => '2000.00',
            ],
            [
                'received_by' => 'Luis Hernandez',
                'total_order_amount' => '4800.00',
            ],
            [
                'received_by' => 'Maria Encarnacion De-Diego',
                'total_order_amount' => '600.00',
            ],
            [
                'received_by' => 'Maria Angela Amat',
                'total_order_amount' => '600.00',
            ]  
        ];

        Order::insert($data);
        
    }
}
