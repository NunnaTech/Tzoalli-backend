<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Observacion;


class ObservacionController extends Controller
{
    public function index()
    {
        try {
            $observaciones = Observacion::all();
            return $observaciones;
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
            $observacion = new Observacion();
            $observacion->descripcion = $request->descripcion;
            $observacion->precio = $request->precio;
            $observacion->stock = $request->stock;

            $observacion->save();

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
    public function update(Request $request)
    {
        try {

            $observacion = Observacion::findOrFail($request->id);
            $observacion->descripcion = $request->descripcion;
            $observacion->precio = $request->precio;
            $observacion->stock = $request->stock;

            $observacion->save();

            return $observacion;

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
    public function destroy(Request $request)
    {
        try {

            $observacion = Observacion::destroy($request->id);
            return $observacion;

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
    }

}
