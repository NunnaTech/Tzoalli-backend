<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
Use Exception;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $visits = Visit::paginate(10);

            return $this->getResponse201("Visits","all consulted", $visits);

        } catch (Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
        }
    }

    public function getMyVisits($status)
    {
        try {
            $user = auth()->user();
            $visits = Visit::with(['visited_by' => function ($query) {
                $query->select('id', 'name', 'second_name', 'last_name', 'email', 'phone');
            }])->with(['grocer' => function ($query) {
                $query->select('id', 'owner_full_name', 'grocer_name', 'address', 'phone', 'zip_code');
            }])->with(['order' => function ($query) {
                $query->with(['details' => function ($query) {
                    $query->with('product');
                }]);
            }])->where("visited_by",$user->id)->where("status",$status)->paginate(10);

                $getData = json_encode($visits);
                $getData = json_Decode($getData);
                foreach ($getData->data as $key => $visit) {
                    if (isset($visit->order)) {
                        $result = array_reduce($visit->order->details, function($carry, $item){ 
                            if(!isset($carry[$item->product_id])){ 
                                $carry[$item->product_id] = [
                                                            'product_id'=>$item->product_id,
                                                            'order_id'=>$item->order_id,
                                                            'quantity'=>$item->quantity,
                                                            'total_amount'=>$item->total_amount,
                                                            'product'=>$item->product
                                                        ]; 
                            } else { 
                                $carry[$item->product_id]['total_amount'] += $item->total_amount; 
                                $carry[$item->product_id]['quantity'] += $item->quantity; 
                            } 
                            return $carry; 
                        });     
                        
                        $visit->order->details = [];
        
                        foreach ($result as $value) {
                            array_push($visit->order->details, $value);
                        }
                    }
                }
              
                $visits = $getData;
            

            return $this->getResponse201("Visits","all consulted by status '{$status}'", $visits);

        } catch (Exception $e) {
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
            'visited_by' => 'required',
            'visit_date' => 'required',
            'status' => 'required',
            'grocer_id' => 'required',
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();
            try {
                $visit = new Visit();
                $visit->visited_by = $request->visited_by;
                $visit->visit_date = $request->visit_date;
                $visit->status = $request->status;
                $visit->order_id = $request->order_id;
                $visit->grocer_id = $request->grocer_id;

                $visit->save();

                DB::commit();
                return $this->getResponse201('New visit', 'created', $visit);
            } catch (Exception $e) {
                DB::rollBack();
                return $this->getResponse500([$e->getMessage()]);
            }
        } else {
            return $this->getResponse500([$validator->errors()]);
        }
    }

    public function storeVisitWithOrder(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'visited_by' => 'required',
            'visit_date' => 'required',
            'status' => 'required',
            'grocer_id' => 'required',
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();
            try {
                DB::beginTransaction();

                $visit = Visit::findOrFail($id);
    
                if($visit->visited_by != auth()->user()->id){
                    return $this->getResponse403();
                }
    
                $visit->status = $request->status;
                $visit->save();

                if ( $visit->status == "En camino") {
                    //create order    
                    $total = 0;
                    foreach($request->products as $item){
                        $product = Product::find($item->product_id);
                        $total += $product->product_price * $item->quantity;
                    }
    
                    $order = new Order();
                    $order->received_by = $request->received_by;
                    $order->total_order_amount = $total;
                    $order->save();
                    $sync_data = [];
    
                    foreach($request->products as $key => $item){
                       $sync_data[$key] = ['product_id' => $item->product_id, 'quantity' => $item->quantity, 'total_amount' =>  $item->total_amount];
                    }
    
                    $order->products()->sync($sync_data);
                }

                DB::commit();
                return  $this->getResponse201('Visit status', 'update', $visit);
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
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visit $visit)
    {
        //
    }
    
    public function updateStatus(Request $request, $id)
    {
       
        try {
            DB::beginTransaction();

            $visit = Visit::findOrFail($id);

            if($visit->visited_by != auth()->user()->id){
                return $this->getResponse403();
            }

            $visit->status = $request->status;

            $visit->save();
            DB::commit();
            return  $this->getResponse201('Visit status', 'update', $visit);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->getResponse500([$e->getMessage()]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            
            if (!Visit::find($id)) {
                return $this->getResponse404("No existe!!",);
            }

            $visit = Visit::destroy($id);
            return $this->getResponseDelete200("Visit");

        } catch (Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
        }
    }
}
