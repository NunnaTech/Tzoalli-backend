<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        try {

            $products = Product::all();

            return json( 0, "Listado", json_decode( $products ) );

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

            $product = new Product();
            $product->product_name = $request->product_name;
            $product->save();
            
            return json( 0, "Guardado", json_decode( $product ) );

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

            $product = Product::findOrFail($request->id);
            $product->product_name = $request->product_name;

            $product->save();
            return json( 0, "Actualizado", json_decode( $product ) );


        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }

        return $product;
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

            $product = Product::destroy($request->id);
            return json( 1, "Borrado",);

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
    }

}
