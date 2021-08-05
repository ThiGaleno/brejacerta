<?php

namespace App\Http\Repositories;

use App\Models\Beer;
use App\Models\Review;

class ReviewRepository
{
    protected $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function getById($id)
    {
        return Beer::where('id', $id)->first();
    }

    public function reviewStore($request, $id)
    {
        $request['user_id'] = auth('api')->user()->id;
        $request['beer_id'] = (int) $id;

        $beer = Beer::where('id', $id)->first();

        return $beer->review()->create($request);
    }

    public function userHasAreadyReviewed($id)
    {
        return Review::where('user_id', auth('api')->user()->id)
            ->where('beer_id', $id)
            ->first();
    }



}
