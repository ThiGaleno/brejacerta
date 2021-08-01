<?php

namespace App\Http\Services;

use App\Http\Repositories\BeerRepository;

class BeerService {

    protected $beerRepository;

    public function __construct(BeerRepository $beerRepository)
    {
        $this->beerRepository = $beerRepository;
    }

    public function index()
    {
        $allBeers = $this->beerRepository->index();
        $beers = $allBeers->toArray();
        foreach($allBeers as $key => $beer){
            if($beer->rating){
                $beers[$key]["rating"] = $this->getMediaRatings($beer->rating);
            }
        }
        return $beers;
    }

    private function getMediaRatings($ratings): float
    {
        $ratingAmount = count($ratings);
        $rate = 0;
        foreach($ratings as $value){
            $rate = $rate + $value->rated;
        }
        return number_format($rate / $ratingAmount, 2);
    }

    public function getBeerById($id)
    {
        $allBeers = $this->beerRepository->getBeerById($id);
        $beers = $allBeers->toArray();
        foreach($allBeers as $key => $beer){
            if($beer->rating){
                $beers[$key]["rating"] = $this->getMediaRatings($beer->rating);
            }
        }
        dd($beers);
    }
}
