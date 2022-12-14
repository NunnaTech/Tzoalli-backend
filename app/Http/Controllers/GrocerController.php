<?php

namespace App\Http\Controllers;

use App\Models\Grocer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\Evidence;

class GrocerController extends Controller
{
    public function index()
    {
        try {
            $grocers = Grocer::all();
            return $this->getResponse201('Grocers', 'consult', $grocers);
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
            'grocer_name' => 'required',
            'owner_full_name' => 'required',
            'phone' => 'required',            
            'address' => 'required',    
            'zip_code' => 'required',            
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();

            try {
                $grocer = new Grocer();
                $grocer->grocer_name = $request->grocer_name;
                $grocer->owner_full_name = $request->owner_full_name;
                $grocer->phone = $request->phone;
                $grocer->address = $request->address;
                $grocer->zip_code = $request->zip_code;
                $grocer->save();

                DB::commit();
                return $this->getResponse201('New Grocer', 'created', $grocer);
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
    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'grocer_name' => 'required',
            'address' => 'required',
            'zip_code' => 'required',    
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();

            try {
                $grocer = Grocer::findOrFail($id);

                $grocer->grocer_name = $request->grocer_name;
                $grocer->address = $request->address;
                $grocer->zip_code = $request->zip_code;

                $grocer->save();
                DB::commit();
                
                return $this->getResponse201('Grocer', 'update', $grocer);

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

            if (!Grocer::find($id)) {
                return $this->getResponse404("No existe!!",);
            }

            $grocer = Grocer::destroy($id);
            return $this->getResponseDelete200("Grocer");

        } catch (\Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
        }
    }

}
