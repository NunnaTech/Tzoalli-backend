<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Establecimiento;
use Illuminate\Http\Exception;


class EstablecimientoController extends Controller
{
    public function index()
    {
        try {

            $establecimientos = Establecimiento::all();

            return json( 0, "Listado", json_decode( $establecimientos ) );
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
            $establecimiento = new Establecimiento();
            $establecimiento->nombre = $request->nombre;
            $establecimiento->direccion = $request->direccion;
            $establecimiento->save();

            return json( 0, "Guardado", json_decode( $establecimiento ) );

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
            $establecimiento = Establecimiento::findOrFail($id);
            $establecimiento->nombre = $request->nombre;
            $establecimiento->direccion = $request->direccion;

            $establecimiento->save();

            return json( 0, "Actualizado", json_decode( $establecimiento ) );

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

            $establecimiento = Establecimiento::destroy($id);
            return json( 0, "Borrado",);

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
    }

}
