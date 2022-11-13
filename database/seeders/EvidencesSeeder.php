<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evidence;

class EvidencesSeeder extends Seeder
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
                'observation_id' => '1',
                'evidence_url' => 'https://firebasestorage.googleapis.com/v0/b/notes-42c80.appspot.com/o/2022-07-06%2010%3A25%3A39.599_image.jpg?alt=media&token=ae684518-8792-4b2a-8d1e-de757ec0f775',
            ],
            [
                'observation_id' => '1',
                'evidence_url' => 'https://firebasestorage.googleapis.com/v0/b/notes-42c80.appspot.com/o/2022-07-06%2010%3A25%3A39.599_image.jpg?alt=media&token=ae684518-8792-4b2a-8d1e-de757ec0f775',            
            ],
            [
                'observation_id' => '2',
                'evidence_url' => 'https://firebasestorage.googleapis.com/v0/b/notes-42c80.appspot.com/o/2022-07-06%2010%3A25%3A39.599_image.jpg?alt=media&token=ae684518-8792-4b2a-8d1e-de757ec0f775',            
            ],
            [
                'observation_id' => '2',
                'evidence_url' => 'https://firebasestorage.googleapis.com/v0/b/notes-42c80.appspot.com/o/2022-07-06%2010%3A25%3A39.599_image.jpg?alt=media&token=ae684518-8792-4b2a-8d1e-de757ec0f775',            
            ],
        ];
        Evidence::insert($data);
    }
}
