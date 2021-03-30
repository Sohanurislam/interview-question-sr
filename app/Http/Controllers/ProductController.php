<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantPrice;
use App\Models\Variant;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $product =Product::with('price','variant')->paginate(1);
        return view('products.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $variants = Variant::all();
        return view('products.create', compact('variants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $requestData =$request->all();
        $product = new Product();
        $product->title=$requestData['title'];
        $product->sku=$requestData['sku'];
        $product->description=$requestData['description'];
        $product->save();
//        foreach ($requestData['product_variant'] as $product_variant)
//        {
//            ProductVariant::create([
//               'variant'=
//               'variant_id'
//               'product_id'
//            ]);
//        }
        return  json_encode(['status'=>'success']);
//        return redirect()->route('product.create')->with(json_encode(['status'=>'success']));

    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $variants = Variant::all();
//        $product = $product->toArray();
        return view('products.edit', compact('variants','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
//        $requestData=$request->all();
//        $product->update($requestData);
        $requestData =$request->all();
        dd($product);
//        $product = new Product();
//        $product->title=$requestData['title'];
//        $product->sku=$requestData['sku'];
//        $product->description=$requestData['description'];
//        $product->update($requestData);

//        return back();
        return  json_encode(['status'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
