<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $orders = Order::with('users')->get();
            
            return json( 0, "Listado", json_decode( $orders ) );

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
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
            $order = new Order();
            $order->order_date = $request->order_date;
            $order->delivery_date = $request->delivery_date;
            $order->quantity = $request->quantity;
            $order->grocer_id = $request->grocer_id;
            $order->user_id = $request->user_id;

            $order->save();

            return json( 0, "Guardado", json_decode( $order ) );

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

            $order = Order::findOrFail($request->id);

            $order->order_date = $request->order_date;
            $order->delivery_date = $request->delivery_date;
            $order->quantity = $request->quantity;
            $order->grocer_id = $request->grocer_id;
            $order->user_id = $request->user_id;

            $order->save();

            return json( 0, "Actualizado", json_decode( $order ) );

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

            $order = Order::destroy($request->id);
            return json( 1, "Borrado",);

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
    }

}
