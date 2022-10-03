<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //php artisan db:seed  --class=ProductsSeeder
    public function run()
    {
        $data = [
            [
                'product_name' => 'Producto 1',
            ],
            [
                'product_name' => 'Producto 2',
            ],
            [
                'product_name' => 'Producto 3',
            ],
            [
                'product_name' => 'Producto 4',
            ]
        ];

        Product::insert($data);
    }
}
