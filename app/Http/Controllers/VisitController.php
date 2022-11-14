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

            return $this->getResponse201("Visits","all consulted", $products);

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

            $visit = Visit::findOrFail($id);

            if($visit->visited_by != auth()->user()->id){
                return $this->getResponse403();
            }

            $visit->status = $request->status;

            $visit->save();

            return  $this->getResponse201('Visit status', 'update', $visit);

        } catch (\Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        //
    }
}
