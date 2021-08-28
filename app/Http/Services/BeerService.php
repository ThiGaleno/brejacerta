<?php

namespace App\Http\Services;

use App\Http\Repositories\BeerRepository;
use App\Traits\ApiResponser;

class BeerService {

    use ApiResponser;

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

    public function beerStore($request)
    {
        return $this->beerRepository->beerStore($request);
    }

    public function delete($id)
    {
        return $this->beerRepository->delete($id);
    }


}
