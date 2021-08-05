<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'rated', 'beer_id', 'commentary', 'user_id'
    ];
    use HasFactory;
}
