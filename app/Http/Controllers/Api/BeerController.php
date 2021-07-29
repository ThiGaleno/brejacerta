<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\BeerService;
use App\Traits\ApiResponser;


class BeerController extends Controller
{
    use ApiResponser;

    protected $beerService;

    public function __construct(BeerService $beerService)
    {
        $this->beerService = $beerService;
    }

    public function index()
    {
        $beers = $this->beerService->index();

        if(!$beers){
            return $this->error("Não encontrado", 404);
        }
        return $this->success($beers, 200);
    }

    public function getBeerById($id){
        $beer = $this->beerService->getBeerById($id);
        if(!$beer){
            return $this->error("Não encontrado", 404);
        }
        return $this->success($beer, 200);
    }

}
