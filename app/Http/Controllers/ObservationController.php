<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Observation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\Evidence;

class ObservationController extends Controller
{
    public function index()
    {
        try {
            $observations = Observation::with('evidences')->get();
            return $this->getResponse201('Observations', 'consult', $observations);
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
            'title' => 'required',
            'comment' => 'required',    
            'visit' => 'required',            
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();

            try {
                $observation = new Observation();
                $observation->title = $request->title;
                $observation->comment = $request->comment;
                $observation->visit_id = $request->visit['id'];
                $observation->save();

                foreach ($request->urls as $url){
                    $evidence = new Evidence;
                    $evidence->evidence_url = $url;
                    $post = $observation->evidences()->save($evidence);
                }

                DB::commit();
                return $this->getResponse201('New Observation', 'created', $observation);
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
    public function show(Observation $observation)
    {
        return [
            "status" => true,
            "message" => "Consulta unica",
            "data" => $observation
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
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'comment' => 'required',    
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();

            try {
                
                if (!Observation::find($id)) {
                    return json( 0, "No existe!!",);
                }
                
                $observation = Observation::findOrFail($id);

                $observation->title = $request->title;
                $observation->comment = $request->comment;

                $observation->save();
                DB::commit();
                
                return $this->getResponse201('Observation', 'update', $observation);

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
            
            if (!Observation::find($id)) {
                return $this->getResponse404("No existe!!",);
            }

            $observation = Observation::destroy($id);
            return $this->getResponseDelete200("Observations");

        } catch (Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
        }
    }

    public function getAllByVisit($idVisit)
    {
        try {

            $observations = Observation::with(['evidences' => function ($query) {
                $query->select('observation_id', 'evidence_url');
            }])->where('visit_id', $idVisit)->get();
            

            if (!isset($observations)) {
                return $this->getResponse404("No existe!!",);
            }

            return $this->getResponse201("Observations","all consulted", $observations);

        } catch (Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
        }
    }
}
