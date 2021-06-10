<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    protected $fillable = [
        'name', 'style', 'category', 'ibu', 'abv', 'glass', 'temperature', 'food_pairing', 'url_photo'

    ];
    use HasFactory;

    public function rating(){
        return $this->hasMany(Rating::class);
    }

}
