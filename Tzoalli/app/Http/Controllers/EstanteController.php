<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estante;

class EstanteController extends Controller
{
    public function index()
    {
        try {

            $estantes = Estante::all();

            return json( 0, "Listado", json_decode( $estantes ) );
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

            $estante = new Estante();
            $estante->descripcion = $request->descripcion;
            $estante->precio = $request->precio;
            $estante->stock = $request->stock;

            $estante->save();

            return json( 0, "Guardado", json_decode( $estante ) );

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

            $estante = Estante::findOrFail($request->id);
            $estante->descripcion = $request->descripcion;
            $estante->precio = $request->precio;
            $estante->stock = $request->stock;

            $estante->save();

            return json( 0, "Actualizado", json_decode( $estante ) );

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

            $estante = Estante::destroy($request->id);
            return $estante;

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
    }

}
