<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $orders = Order::with('users')->get();
            
            return $this->getResponse201('Orders', 'consult', $orders);

        } catch (\Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
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
            'visit_id' => 'required',            
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();

            try {
                $total = 0;
                foreach($request->products as $item){
                    $product = Product::find($item['product_id']);
                    $total += $product->product_price * $item['quantity'];
                }

                $order = new Order();
                $order->received_by = $request->received_by;
                $order->total_order_amount = $total;
                $order->save();
                $sync_data = [];

                foreach($request->products as $key => $item){
                   $sync_data[$key] = ['product_id' => $item['product_id'], 'quantity' => $item['quantity'], 'total_amount' =>  $item['total_amount']];
                }

                $order->products()->sync($sync_data);

                $visit = Visit::findOrFail($request->visit_id);

                if($visit->visited_by != auth()->user()->id){
                    Log::info("No existe visita propia");
                }else{
                    $visit->status = "En camino";
                    $visit->order_id = $order->id;
                    $visit->save();    
                }

                DB::commit();
                return $this->getResponse201('New Order', 'created', $order);
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
        $validator = Validator::make($request->all(), [
            'received_by' => 'required',
            'total_order_amount' => 'required',    
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();

            try {

                $order = Order::findOrFail($request->id);

                $order->received_by = $request->received_by;
                $order->total_order_amount = $total;
                $order->save();

                DB::commit();
                return $this->getResponse201('Order', 'update', $order);

            } catch (Exception $e) {
                DB::rollBack();
                return $this->getResponse500([$e->getMessage()]);
            }
        } else {
            return $this->getResponse500([$validator->errors()]);
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

            if (!Order::find($id)) {
                return $this->getResponse404("No existe!!",);
            }
            
            $order = Order::destroy($id);
            return $this->getResponseDelete200("Order");

        } catch (\Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
        }
    }

}
