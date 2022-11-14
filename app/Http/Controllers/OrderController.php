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
        
        $validator = Validator::make($request->all(), [
            'received_by' => 'required',
            'total_order_amount' => 'required',    
            'products' => 'required',            
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();

            try {
                $order = new Order();
                $order->received_by = $request->received_by;
                $order->total_order_amount = $request->total_order_amount;
                foreach($request->products as $item){
                    $order->products()->attach($item);
                }
                $order->save();

                DB::commit();
                return $this->getResponse201('New Order', 'created', $visit);
            } catch (Exception $e) {
                DB::rollBack();
                return $this->getResponse500([$e->getMessage()]);
            }
        } else {
            return $this->getResponse500([$validator->errors()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        try {
            $order = Order::with(['details' => function ($query) {
                $query->select('id','product_id','order_id','quantity','total_amount')->with('product');
            }])->find($order->id);
            
            return $this->getResponse201("Order","order detail", $order);

        } catch (Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
        }
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
    public function destroy($id)
    {
        try {

            $order = Order::destroy($id);
            return json( 1, "Borrado",);

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
    }

}
