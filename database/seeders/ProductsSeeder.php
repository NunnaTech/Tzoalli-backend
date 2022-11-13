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
                'product_image' => 'https://m.media-amazon.com/images/I/51lntXtuZ7L._AC_.jpg',
                'product_price' => '15.00',
            ],
            [
                'product_name' => 'Producto 2',
                'product_image' => 'https://m.media-amazon.com/images/I/51lntXtuZ7L._AC_.jpg',
                'product_price' => '40.00',
            ],
            [
                'product_name' => 'Producto 3',
                'product_image' => 'https://m.media-amazon.com/images/I/51lntXtuZ7L._AC_.jpg',
                'product_price' => '25.00',
            ],
            [
                'product_name' => 'Producto 4',
                'product_image' => 'https://m.media-amazon.com/images/I/51lntXtuZ7L._AC_.jpg',
                'product_price' => '5.00',
            ]
        ];

        Product::insert($data);
    }
}
