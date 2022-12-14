<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grocer;

class GrocesrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //php artisan db:seed  --class=GrocesrSeeder
    public function run()
    {
        $data = [
            [
                'owner_full_name' => 'Florentina Tomás Esteban',
                'phone' => '7778822338',
                'grocer_name' => 'Tienda Coco Pin Pon',
                'address' => 'Av. Plan de Ayala 68, Teopanzolco,  Cuernavaca, Mor.',
                'zip_code' => '62350',
            ],
            [
                'owner_full_name' => 'Marc Noriega Paniagua',
                'phone' => '7771252565',
                'grocer_name' => 'Tienda Coco Loco',
                'address' => 'C. Nueva Inglaterra 423, Lomas de Cortes, Cuernavaca, Mor.',
                'zip_code' => '62240',
            ],
            [
                'owner_full_name' => 'Rosario Anastasia Amigó Mayol',
                'phone' => '777022125',
                'grocer_name' => 'Tienda Luna Feliz',
                'address' => 'Av. Domingo Diez 1470-1538, Lomas de la Selva, Cuernavaca, Mor.',
                'zip_code' => '62253',
            ],
            [
                'owner_full_name' => 'Geraldo del Sevillano',
                'phone' => '777022008',
                'grocer_name' => 'Tienda La Panela',
                'address' => 'Av Teopanzolco 100, zona 1, Recursos Hidraulicos, Cuernavaca, Mor.',
                'zip_code' => '62245',
            ],
            [
                'owner_full_name' => 'Elvira Molina Ponce',
                'phone' => '7779909511',
                'grocer_name' => 'Tienda El Búho',
                'address' => 'Av. Cuauhtémoc 128, Las Quintas, Cuernavaca, Mor.',
                'zip_code' => '62450',
            ],
            [
                'owner_full_name' => 'Noemi Molina Cambrai',
                'phone' => '7773321100',
                'grocer_name' => 'El artesano de dulces',
                'address' => 'Mariano Abasolo 38, Amatitlán, Cuernavaca, Mor.',
                'zip_code' => '62410',
            ], 
            [
                'owner_full_name' => 'Noe Cambrai',
                'phone' => '7778856644',
                'grocer_name' => 'Lollypopworld',
                'address' => 'Janitzio 51-43, Lazaro Cardenas, Cuernavaca, Mor.',
                'zip_code' => '62080',
            ], 
            [
                'owner_full_name' => 'Alan Ponce',
                'phone' => '7776311215',
                'grocer_name' => 'La dulce suite',
                'address' => 'Adolfo Ruíz Cortínez 412, Los Presidentes, Temixco, Mor.',
                'zip_code' => '86060',
            ], 
            [
                'owner_full_name' => 'Eduardo Velazquez',
                'phone' => '7776319959',
                'grocer_name' => 'Cyber ​​Candy',
                'address' => 'Virginia Fábregas LB, Los Presidentes, Temixco, Mor.',
                'zip_code' => '62583',
            ],
        ];

        Grocer::insert($data);
    }
}
