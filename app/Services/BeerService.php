<?php

namespace App\Services;

use App\Models\Beer;
use App\Models\Rating;

class BeerService {
    public function __construct()
    {

    }

    public function index()
    {
        $beers = Beer::all();
        return $beers;
    }

    public function getMediaRatings($ratings): float{
        $ratingAmount = count($ratings);
        $rate = 0;
        foreach($ratings as $value){
            $rate = $rate + $value->rated;
        }
        return number_format($rate / $ratingAmount, 2);
    }
}
