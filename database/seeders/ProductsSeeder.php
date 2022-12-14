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
                'product_name' => 'Paquete de alegrias',
                'description' => 'Alegría de amaranto con cacahuate.',
                'product_image' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/productos/public/Alegrias.png',
                'product_price' => '50.00',
                'stock' => '100',
            ],
            [
                'product_name' => 'Ate',
                'description' => 'Paquete de Ate surtido de frutas en cubitos.',
                'product_image' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/productos/public/Ate.jpg',
                'product_price' => '20.00',
                'stock' => '200',
            ],
            [
                'product_name' => 'Paquete de glorias',
                'description' => 'Dulce de leche Las Sevillanas Glorias con nuez.',
                'product_image' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/productos/public/Glorias.png',
                'product_price' => '50.00',
                'stock' => '200',
            ],
            [
                'product_name' => 'Paquete de palanquetas de cacahuate',
                'description' => 'Barra de cacahuate cubierta de caramelo.',
                'product_image' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/productos/public/Palanqueta.png',
                'product_price' => '30.00',
                'stock' => '400',
            ],
            [
                'product_name' => 'Paquete de Borrachines de sabores',
                'description' => 'Auténticos borrachines  de leche y licor.',
                'product_image' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/productos/public/borrachies.jpg',
                'product_price' => '100.00',
                'stock' => '400',
            ],
            [
                'product_name' => 'Paquete de Mazapanes',
                'description' => 'Caja de Mazapan La Rosa, El favorito de todos. Elaborado con cacahuates tostados perfectamente.',
                'product_image' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/productos/public/dulces-de-la-rosa_mazapan.png',
                'product_price' => '50.00',
                'stock' => '400',
            ],

            [
                'product_name' => 'Paquete de Jamoncillo',
                'description' => 'Dulce típico mexicano de leche con nuez.',
                'product_image' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/productos/public/jamoncillo.png',
                'product_price' => '120.00',
                'stock' => '400',
            ],
            [
                'product_name' => 'Vaso de pulpa de mango',
                'description' => 'Vaso de pulpa de mango con chile.',
                'product_image' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/productos/public/vaso-mango.png',
                'product_price' => '15.00',
                'stock' => '400',
            ],
            [
                'product_name' => 'Vaso de pulpa de tamarindo',
                'description' => 'Vaso de pulpa de tamarindo con chile.',
                'product_image' => 'https://szdguzpruwwvtoimdfyk.supabase.co/storage/v1/object/public/productos/public/vaso-tamarindo.png',
                'product_price' => '15.00',
                'stock' => '400',
            ]

        ];

        Product::insert($data);
    }
}
