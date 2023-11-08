<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{

    public function index(Product $product)
    {
        /*
        return Review::paginate(10);
        */
        /*
        return $product->reviews;
        */
        return ReviewResource::collection($product->reviews);
    }


    public function create()
    {
        //
    }


    public function store(ReviewRequest $request, Product $product)
    {
        /*
        $review = Review::create($request->all()); //This option gives error because of the lack of product_id
        $review->product_id = $product->id;
        */
        $review = new Review($request->all()); //This option automatically sets the product_id from the request
        $product->reviews()->save($review); //This is for adding our review to the product's reviews list

        return response([
            "success" => "Review Successfully created !!!",
            "data" => new ReviewResource($review)
        ]);
    }


    public function show(Review $review)
    {
        //
    }


    public function edit(Review $review)
    {
        //
    }


    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }


    public function destroy(Review $review)
    {
        //
    }
}
