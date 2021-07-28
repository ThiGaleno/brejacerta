<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BeerService;
use App\Traits\ApiResponser;


class BeerController extends Controller
{
    use ApiResponser;

    private $beerService;
    public function __construct(BeerService $beerService)
    {
        $this->beerService = $beerService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBeers = $this->beerService->index();
        $beers = $allBeers->toArray();
            foreach($allBeers as $key => $beer){
                if($beer->rating){
                    $beers[$key]["rating"] = $this->beerService->getMediaRatings($beer->rating);
                }
            }
        return $this->success($beers, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
