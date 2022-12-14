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
                'evidence_url' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/evidencias/public/cerrado.jpg',
            ],
            [
                'observation_id' => '6',
                'evidence_url' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/evidencias/public/observacion1.jpg',            
            ],
            [
                'observation_id' => '2',
                'evidence_url' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/evidencias/public/observacion2.jpg',            
            ],
            [
                'observation_id' => '3',
                'evidence_url' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/evidencias/public/observacion3.jpg',            
            ],
            [
                'observation_id' => '4',
                'evidence_url' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/evidencias/public/robado.jpg',            
            ],
            [
                'observation_id' => '5',
                'evidence_url' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/evidencias/public/vacio.jpg',            
            ],
            
        ];
        Evidence::insert($data);
    }
}
