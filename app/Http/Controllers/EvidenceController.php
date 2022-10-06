<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evidence;

class EvidenceController extends Controller
{
    public function index()
    {
        try {
            $evidences = Evidence::all();
            return json( 0, "Listado", json_decode( $evidences ) );
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
            $evidence = new Evidence();
            $evidence->evidence_url = $request->evidence_url;
            $evidence->observation_id = $request->observation_id;
            $evidence->save();

            return json( 0, "Guardado", json_decode( $evidence ) );

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
        try {
             
            if (!Evidence::find($id)) {
                return json( 0, "No existe!!",);
            }
            
            $evidence = Evidence::findOrFail($id);

            $evidence->evidence_url = $request->evidence_url;
            $evidence->observation_id = $request->observation_id;

            $evidence->save();

            return json( 0, "Actualizado", json_decode( $evidence ) );

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
            
            if (!Evidence::find($id)) {
                return json( 0, "No existe!!",);
            }

            $evidence = Evidence::destroy($id);
            return json( 1, "Borrado",);

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
    }
}
