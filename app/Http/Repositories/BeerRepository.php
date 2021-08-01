<?php

namespace App\Http\Repositories;

use App\Models\Beer;

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

    public function reviewStore($request)
    {
        return $this->beer->review()->create($request);
    }

}
