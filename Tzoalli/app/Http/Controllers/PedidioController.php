<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidioController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return $pedidos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $pedido = new Pedido();
            $pedido->descripcion = $request->descripcion;
            $pedido->precio = $request->precio;
            $pedido->stock = $request->stock;

            $pedido->save();

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            $pedido = Pedido::findOrFail($request->id);
            $pedido->descripcion = $request->descripcion;
            $pedido->precio = $request->precio;
            $pedido->stock = $request->stock;

            $pedido->save();

            return $pedido;

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {

            $pedido = Pedido::destroy($request->id);
            return $pedido;

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
    }

}
