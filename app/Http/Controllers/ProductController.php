<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;



class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth:api")->except('index', 'show');
    }

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
        /*
        return $request->all();
        */
        $product = new Product;
        $product->name = $request->name;
        $product->detail = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount = $request->discount;
        $product->save();

        if ($product) {
            return new ProductResource($product);
        } else {
            return "Something went wrong please try again";
        }
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
        $product->detail = $request->description;
        $product->update($request->all());
        if ($product) {
            return new ProductResource($product);
        } else {
            return "Something went wrong while updating the product";
        }
    }


    public function destroy(Product $product)
    {
        /*
        return new ProductResource($product);
        */
        $product_name = $product->name;
        if ($product->delete()) {
            return "'' " . $product_name . " ''" . " named product deleted successfully !";
        } else {
            return "Something went wrong while deleting the product";
        }
    }
}
