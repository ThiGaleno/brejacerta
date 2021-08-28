<?php

namespace App\Http\Repositories;

use App\Models\Beer;
use App\Models\Review;
use App\Models\User;

class BeerRepository
{
    protected $beer;

    public function __construct(Beer $beer)
    {
        $this->beer = $beer;
    }
    public function index()
    {
        return Beer::all();
    }

    public function getBeerById($id)
    {
        return Beer::where('id', $id)->get();
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
            ->firstOrFail();
    }

    public function beerStore($request)
    {
        return $this->beer->create($request);
    }

    public function delete($id)
    {
        $beer = Beer::find($id);
        return $beer->delete();
    }

}
