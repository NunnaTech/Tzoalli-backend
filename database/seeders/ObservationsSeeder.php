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
                'title' => 'Tienda cerrada',
                'comment' => 'se llegó a la tienda, el día 15 de diciembre por la mañana y el local estaba cerrado.',
                'visit_id' => '1',
            ],
            [
                'title' => 'Entrega terminada',
                'comment' => 'Se llegó a la tienda y se colocó el producto dentro de la tienda sin problema.',
                'visit_id' => '2',
            ],
            [
                'title' => 'Entrega exitosa',
                'comment' => 'La tienda recibió su pedido sin ningún inconveniente.',
                'visit_id' => '3',
            ],
            [
                'title' => 'Estantes aún con producto',
                'comment' => 'Se llegó a la tienda y se revisó que la tienda aún no ha terminado de vender todo su producto de la última entrega.',
                'visit_id' => '4',
            ],
            [
                'title' => 'Producto caduco',
                'comment' => 'Se revisó el producto de la entrega y se notó que uno de los paquetes tenía ya una fecha de caducidad vencida.',
                'visit_id' => '6',
            ],
            [
                'title' => 'Estante robado',
                'comment' => 'El día de ayer se metieron a robar a la tienda y se llevaron el stand de dulces.',
                'visit_id' => '5',
            ],
        ];
        Observation::insert($data);

    }
}
