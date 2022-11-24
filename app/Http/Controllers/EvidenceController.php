<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evidence;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class EvidenceController extends Controller
{
    public function index()
    {
        try {
            $evidences = Evidence::all();
            return $this->getResponse201('Evidences', 'consult', $evidences);
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
            'evidence_url' => 'required',
            'observation_id' => 'required',    
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();

            try {
                $evidence = new Evidence();
                $evidence->evidence_url = $request->evidence_url;
                $evidence->observation_id = $request->observation_id;
                $evidence->save();

                DB::commit();
                return $this->getResponse201('New Evidence', 'created', $evidence);

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
    public function show(Evidence $evidence)
    {
        return [
            "status" => true,
            "message" => "Consulta unica",
            "data" => $evidence
        ];
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
            'title' => 'required',
            'comment' => 'required',    
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();

            try {
                
                if (!Evidence::find($id)) {
                    return json( 0, "No existe!!",);
                }
                
                $evidence = Evidence::findOrFail($id);

                $evidence->evidence_url = $request->evidence_url;
                $evidence->observation_id = $request->observation_id;

                $evidence->save();
                DB::commit();

                return $this->getResponse201('Evidence', 'update', $evidence);

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
            
            if (!Evidence::find($id)) {
                return $this->getResponse404("No existe!!",);
            }

            $evidence = Evidence::destroy($id);
            return $this->getResponseDelete200("Evidence");

        } catch (\Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
        }
    }
}
