<?php

namespace App\Http\Controllers;

use App\Exceptions\NotAccessException;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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


    public function update(UpdateReviewRequest $request, Product $product, Review $review)
    {
        /*
        $this->CheckUserAuthorization($product);
        */
        $review->update($request->all());
        if ($review) {
            return response([
                "success" => "Review updated successfully!",
                "updated" => new ReviewResource($review)
            ]);
        } else {
            return response([
                "errors" => "Something went wrong while updating the review !"
            ]);
        }
    }


    public function destroy(Product $product, Review $review)
    {
        /*
        $this->CheckUserAuthorization($product);
        */
        $deletedReview = $review->customer;
        if ($review->delete()) {
            return response([
                "success" => "'" . $deletedReview . "'" . " review has been successfully deleted !"
            ]);
        } else {
            return response([
                "errors" => "Something went wrong when deleting this review please try again !"
            ]);
        }
    }

    /*
    public function CheckUserAuthorization(Product $product)
    {
        if (Auth::id() !== $product->user_id) {
            throw new NotAccessException;
        }
    }
    */
}
