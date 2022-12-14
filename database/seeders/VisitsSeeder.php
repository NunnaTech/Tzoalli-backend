<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visit;

class VisitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

   //php artisan db:seed  --class=VisitsSeeder
   public function run()
   {
        $data = [
            [
                'visited_by' => '3',
                'visit_date' => '2022-11-30',
                'status' => 'Realizado',
                'order_id' => '1',
                'grocer_id' => '1',
            ],
            [
                'visited_by' => '3',
                'visit_date' => '2022-11-25',
                'status' => 'Realizado',
                'order_id' => null,
                'grocer_id' => '2',
            ],
            [
                'visited_by' => '3',
                'visit_date' => '2022-11-25',
                'status' => 'Realizado',
                'order_id' => '2',
                'grocer_id' => '3',
            ],
            [
                'visited_by' => '3',
                'visit_date' => '2022-12-10',
                'status' => 'Realizado',
                'order_id' => '3',
                'grocer_id' => '4',
            ],
            [
                'visited_by' => '3',
                'visit_date' => '2022-12-15',
                'status' => 'En camino',
                'order_id' => '4',
                'grocer_id' => '5',
            ], 
            [
                'visited_by' => '3',
                'visit_date' => '2022-12-15',
                'status' => 'En camino', 
                'order_id' => '5',
                'grocer_id' => '1',
            ],
            [
                'visited_by' => '3',
                'visit_date' => '2022-12-20',
                'status' => 'Pendiente',
                'order_id' => null,
                'grocer_id' => '2',
            ],
            [
                'visited_by' => '3',
                'visit_date' => '2022-12-20',
                'status' => 'Pendiente',
                'order_id' => null,
                'grocer_id' => '3',
            ],
            [
                'visited_by' => '3',
                'visit_date' => '2022-12-20',
                'status' => 'Pendiente',
                'order_id' => null,
                'grocer_id' => '4',
            ],
            [
                'visited_by' => '3',
                'visit_date' => '2022-12-20',
                'status' => 'Pendiente',
                'order_id' => null,
                'grocer_id' => '5',
            ],
            [
                'visited_by' => '3',
                'visit_date' => '2022-12-20',
                'status' => 'Pendiente',
                'order_id' => null,
                'grocer_id' => '1',
            ],
            [
                'visited_by' => '4',
                'visit_date' => '2022-12-02',
                'status' => 'Realizado',
                'order_id' => '9',
                'grocer_id' => '2',
            ],
            [
                'visited_by' => '4',
                'visit_date' => '2022-12-02',
                'status' => 'Realizado',
                'order_id' => '6',
                'grocer_id' => '3',
            ],
            [
                'visited_by' => '4',
                'visit_date' => '2022-12-02',
                'status' => 'Realizado',
                'order_id' => '7',
                'grocer_id' => '4',
            ],
            [
                'visited_by' => '5',
                'visit_date' => '2022-12-02',
                'status' => 'Realizado',
                'order_id' => '8',
                'grocer_id' => '5',
            ],
            [
                'visited_by' => '5',
                'visit_date' => '2022-12-02',
                'status' => 'Realizado',
                'order_id' => null,
                'grocer_id' => '1',
            ],
            [
                'visited_by' => '4',
                'visit_date' => '2022-12-15',
                'status' => 'En camino',
                'order_id' => null,
                'grocer_id' => '2',
            ],
            [
                'visited_by' => '5',
                'visit_date' => '2022-12-20',
                'status' => 'Pendiente',
                'order_id' => null,
                'grocer_id' => '3',
            ],
            [
                'visited_by' => '5',
                'visit_date' => '2022-12-20',
                'status' => 'Pendiente',
                'order_id' => null,
                'grocer_id' => '4',
            ],
            [
                'visited_by' => '5',
                'visit_date' => '2022-12-20',
                'status' => 'Pendiente',
                'order_id' => null,
                'grocer_id' => '5',
            ],
        ];

       Visit::insert($data);

   }
}
