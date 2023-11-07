<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;



class ProductController extends Controller
{

    public function index()
    {
        /*
        return Product::all();
        */
        /*
        return ProductResource::collection(Product::all());
        */
        return ProductCollection::collection(Product::paginate(10));
    }


    public function create()
    {
        //
    }


    public function store(StoreProductRequest $request)
    {
        //
    }


    public function show(Product $product)
    {
        //for all attributes like in the table
        /*
        return $product;
        */

        //for just what we liked to show using the resource class
        return new ProductResource($product);
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
