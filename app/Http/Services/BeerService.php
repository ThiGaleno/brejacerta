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
            if($beer->review){
                $beers[$key]["review"] = $this->getMediaReviews($beer->review);
            }
        }
        return $beers;
    }

    private function getMediaReviews($reviews): float
    {
        $reviewAmount = count($reviews);
        $review = 0;
        foreach($reviews as $value){
            $review = $review + $value->rated;
        }
        return number_format($review / $reviewAmount, 2);
    }

    public function getBeerById($id)
    {
        $allBeers = $this->beerRepository->getBeerById($id);
        $beers = $allBeers->toArray();
        foreach($allBeers as $key => $beer){
            if($beer->review){
                $beers[$key]["review"] = $this->getMediaReviews($beer->review);
            }
        }
        return $beers;
    }

    public function reviewStore(array $request)
    {
        return $this->beerRepository->reviewStore($request);
    }
}
