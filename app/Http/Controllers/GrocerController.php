<?php

namespace App\Http\Controllers;

use App\Models\Grocer;
use Illuminate\Http\Request;

class GrocerController extends Controller
{
    public function index()
    {
        try {
            $grocers = Grocer::all();
            return json( 0, "Listado", json_decode( $grocers ) );
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
            $grocer = new Grocer();
            $grocer->grocer_name = $request->grocer_name;
            $grocer->address = $request->address;
            $grocer->zip_code = $request->zip_code;
            $grocer->save();

            return json( 0, "Guardado", json_decode( $grocer ) );

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
        try {
            $grocer = Grocer::findOrFail($id);

            $grocer->grocer_name = $request->grocer_name;
            $grocer->address = $request->address;
            $grocer->zip_code = $request->zip_code;

            $grocer->save();

            return json( 0, "Actualizado", json_decode( $grocer ) );

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

            $grocer = Grocer::destroy($id);
            return json( 1, "Borrado",);

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
    }

}
