<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

   //php artisan db:seed  --class=UserSeeder
   public function run()
   {
        $data = [
            [
                'name' => 'Leonardo',
                'second_name' => 'Cantoran',
                'last_name' => 'Molina',
                'email' => 'Leonardo@gmail.com',
                'password' => 'secret',
                'is_Admin' => '1',
                'phone' => '7773308855',
            ],
            [
                'name' => 'Jair',
                'second_name' => 'Vasquez',
                'last_name' => 'Martinez',
                'email' => 'jair@gmail.com',
                'password' => 'secret',
                'is_Admin' => '1',
                'phone' => '7773308855',
            ],
            [
                'name' => 'Raul',
                'second_name' => 'Adame ',
                'last_name' => 'Najera',
                'email' => 'raul@gmail.com',
                'password' => 'secret',
                'is_Admin' => '0',
                'phone' => '7773308855',
            ],
            [
                'name' => 'Esmeralda',
                'second_name' => 'Lara',
                'last_name' => 'Arroyo',
                'email' => 'esme@gmail.com',
                'password' => 'secret',
                'is_Admin' => '0',
                'phone' => '7773308855',
            ],
            [
                'name' => 'Pavel',
                'second_name' => 'Molina',
                'last_name' => 'Ponce',
                'email' => 'pavel@gmail.com',
                'password' => 'secret',
                'is_Admin' => '0',
                'phone' => '7773308855',
            ], 
            [
                'name' => 'Yami',
                'second_name' => 'Solis',
                'last_name' => 'Ponce',
                'email' => 'yami@gmail.com',
                'password' => 'secret',
                'is_Admin' => '0',
                'phone' => '7773308855',
            ]
        ];

       User::insert($data);

   }
}
