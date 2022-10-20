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
                'status' => '1',
                'order_id' => '1',
                'grocer_id' => '1',
            ],
            [
                'visited_by' => '3',
                'visit_date' => '2022-11-25',
                'status' => '1',
                'order_id' => '2',
                'grocer_id' => '2',
            ],
            [
                'visited_by' => '3',
                'visit_date' => '2022-11-25',
                'status' => '1',
                'order_id' => '2',
                'grocer_id' => '1',
            ],
            [
                'visited_by' => '4',
                'visit_date' => '2022-11-15',
                'status' => '1',
                'order_id' => '3',
                'grocer_id' => '1',
            ],
            [
                'visited_by' => '4',
                'visit_date' => '2022-11-15',
                'status' => '1',
                'order_id' => '3',
                'grocer_id' => '2',
            ], 
            [
                'visited_by' => '5',
                'visit_date' => '2022-12-02',
                'status' => '1',
                'order_id' => '3',
                'grocer_id' => '3',
            ]
        ];

       Visit::insert($data);

   }
}
