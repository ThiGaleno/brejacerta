<?php

namespace App\Http\Repositories;

use App\Models\Beer;

class BeerRepository
{
    public function index()
    {
        return Beer::all();
    }

    public function getBeerById($id)
    {
        return Beer::where('id', $id)->get();
    }

}
