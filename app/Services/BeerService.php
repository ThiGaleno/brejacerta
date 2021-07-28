<?php

namespace App\Services;

use App\Models\Beer;

class BeerService {
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
