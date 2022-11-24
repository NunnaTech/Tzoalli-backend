<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class OrderDetailController extends Controller
{
    public function index()
    {
        try {
            $orderDetails = OrderDetail::all();

            return $this->getResponse201('Order details', 'consult', $orderDetails);

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
            'product_id' => 'required',
            'order_id' => 'required',
            'quantity' => 'required',    
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();

            try {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $request->order_id;
                $orderDetail->product_id = $request->product_id;
                $orderDetail->quantity = $request->quantity;
                $orderDetail->total_amount = 0;
                $orderDetail->save();

                DB::commit();
                return $this->getResponse201('Order Detail', 'created', $orderDetail);

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
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'order_id' => 'required',
            'quantity' => 'required',    
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();

            try {

                $orderDetail = OrderDetail::findOrFail($request->id);
                $orderDetail->id_product = $request->id_product;
                $orderDetail->order_id = $request->order_id;
                $orderDetail->quantity = $request->quantity;
                $orderDetail->save();
                
                DB::commit();
                return $this->getResponse201('Order detail', 'update', $orderDetail);

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

            if (!OrderDetail::find($id)) {
                return $this->getResponse404("No existe!!",);
            }

            $orderDetail = OrderDetail::destroy($id);
            return $this->getResponseDelete200("Order detail");

        } catch (\Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
        }
    }

}
