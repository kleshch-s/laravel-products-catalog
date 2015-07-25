<?php

namespace Kleshchs\ProdCatalog\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

use Kleshchs\ProdCatalog\Models\Product;
use Kleshchs\ProdCatalog\Requests\StoreProductRequest;
use Kleshchs\ProdCatalog\Requests\UpdateProductRequest;

class ProductController extends Controller{

    /**
     * Display a listing of the products.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::all();
        return view('prodCatViews::list', compact('products'));
    }
    /**
     * Show the form for creating a new product.
     *
     * @return Response
     */
    public function create()
    {
        $product = new Product();
        return view('prodCatViews::create', compact('product'));
    }
    /**
     * Store a newly created product in storage.
     *
     * @return Response
     */
    public function store(StoreProductRequest $request)
    {
        Product::create($request->except('_token'));
        return redirect('products');
    }
        /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('prodCatViews::update', compact('product'));
    }
    /**
     * Update the specified product in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->art = $request->input('art');
        $product->name = $request->input('name');
        $product->save();
        return redirect('products');
    }
    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('products');
    }
}