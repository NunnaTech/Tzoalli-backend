<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Observation;

class ObservationController extends Controller
{
    public function index()
    {
        try {
            $observations = Observation::all();
            return json( 0, "Listado", json_decode( $observations ) );
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
            $observation = new Observation();
            $observation->comment = $request->comment;
            $observation->save();

            return json( 0, "Guardado", json_decode( $observation ) );

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
    public function update($id,Request $request)
    {
        try {
             
            if (!Observation::find($id)) {
                return json( 0, "No existe!!",);
            }
            
            $observation = Observation::findOrFail($id);

            $observation->comment = $request->comment;

            $observation->save();

            return json( 0, "Actualizado", json_decode( $observation ) );

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
            
            if (!Observation::find($id)) {
                return json( 0, "No existe!!",);
            }

            $observation = Observation::destroy($id);
            return json( 1, "Borrado",);

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
    }
}
