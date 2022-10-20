<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Observation;

class ObservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Observación 1',
                'comment' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
                'visit_id' => '1',
            ],
            [
                'title' => 'Observación 2',
                'comment' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock',
                'visit_id' => '2',
            ],
            [
                'title' => 'Observación 3',
                'comment' => 'discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of',
                'visit_id' => '3',
            ],
            [
                'title' => 'Observación 4',
                'comment' => 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested',
                'visit_id' => '3',
            ],
        ];
        Observation::insert($data);

    }
}
