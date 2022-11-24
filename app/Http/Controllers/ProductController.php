<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        try {

            $products = Product::paginate(10);

            return $this->getResponse201("Products","Consult", $products);

        } catch (Exception $e) {
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
            'product_name' => 'required|size:2',
            'product_image' => 'required',
            'product_price' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0'
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();
            try {
                $product = new Product();
                $product->product_name = $request->product_name;
                $product->product_image = $request->product_image;
                $product->product_price = $request->product_price;
                $product->save();

                DB::commit();
                return $this->getResponse201('Product', 'created', $product);
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
    public function show(Product $product)
    {
        try {
            return 
                $this->getResponse201('Product', 'find', $product);
        } catch (Exception $e) {
            return 
                $this->getResponse500([$e->getMessage()]);
        }
    }

      /**
     * Find by keyword
     *
     * @param  string  $searchValue
     * @return \Illuminate\Http\Response
     */
    public function findByName($searchValue)
    {
        try {
            $product = Product::where(function ($q) use ($searchValue) {
                $q->orWhere('product_name', 'like', "%{$searchValue}%");
            });
            return $this->getResponse201('Product', 'find', $product->get());
        } catch (Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
        }
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
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|size:2',
            'product_image' => 'required',
            'product_price' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0'
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();
            try {

                $product = Product::findOrFail($request->id);
                $product->product_name = $request->product_name;
                $product->product_image = $request->product_image;
                $product->product_price = $request->product_price;

                $product->save();

                DB::commit();
                return  $this->getResponse201('Product', 'update', $product);

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

            if (!Product::find($id)) {
                return $this->getResponse404("No existe!!",);
            }

            $product = Product::destroy($id);
            return $this->getResponseDelete200("Product");

        } catch (\Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
        }
    }

}
