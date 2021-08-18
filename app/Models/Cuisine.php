<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    use HasFactory;

    public function cusinRestaurant()
    {
        return $this->belongsToMany(Restaurant::class, 'cuisine_restaurants', 'cuisine_id', 'restaurant_id');
    }
}
