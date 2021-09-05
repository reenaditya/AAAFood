<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuisineRestaurant extends Model
{
    use HasFactory;
    protected $fillable = [];

    public function cuisineId()
    {
        return $this->belongsTo(Cuisine::class,'cuisine_id');
    }

    public function restaurantId()
    {
        return $this->belongsTo(Restaurant::class,'restaurant_id');
    }
    
}
