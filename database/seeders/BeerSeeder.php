<?php

namespace Database\Seeders;

use App\Models\Beer;
use App\Models\Rating;
use Illuminate\Database\Seeder;

class BeerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beers = [
            'name' => 'Skol',
            'style' => 'pilsen',
            'category' => 'milho',
            'ibu' => 14,
            'abv' => 4.6,
            'glass' => 'copo americano',
            'temperature' => 2,
            'food_pairing' => 'mortadela',
            'manufacturer' => 'ambev',
        ];
        $beer = Beer::create($beers);

        Rating::create([
            'rated' => 4,
            'beer_id' => $beer->id
        ]);

        Rating::create([
            'rated' => 2.7,
            'beer_id' => $beer->id
        ]);

        Rating::create([
            'rated' => 3.3,
            'beer_id' => $beer->id
        ]);

        Rating::create([
            'rated' => 4.1,
            'beer_id' => $beer->id
        ]);

        Rating::create([
            'rated' => 5,
            'beer_id' => $beer->id
        ]);

        Rating::create([
            'rated' => 5.5,
            'beer_id' => $beer->id
        ]);


        $beers = [
            'name' => 'kaiser',
            'style' => 'lager',
            'category' => 'milho',
            'ibu' => 12,
            'abv' => 4.7,
            'glass' => 'copo americano',
            'temperature' => 3,
            'food_pairing' => 'torresmo',
            'manufacturer' => 'ambev'
        ];
        $beer = Beer::create($beers);

        Rating::create([
            'rated' => 9,
            'beer_id' => $beer->id
        ]);

        Rating::create([
            'rated' => 5.7,
            'beer_id' => $beer->id
        ]);

        Rating::create([
            'rated' => 9.3,
            'beer_id' => $beer->id
        ]);

        Rating::create([
            'rated' => 4.1,
            'beer_id' => $beer->id
        ]);

        Rating::create([
            'rated' => 0,
            'beer_id' => $beer->id
        ]);

        Rating::create([
            'rated' => 5.5,
            'beer_id' => $beer->id
        ]);
    }
}
