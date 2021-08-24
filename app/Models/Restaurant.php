<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Restaurant extends Model
{
    use HasFactory;

    public function cuisin()
    {
        return $this->belongsToMany(Cuisine::class,'cuisine_restaurants');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function restaurantOffer()
    {
        return $this->hasMany(RestaurantOffer::class,'restaurant_id');
    }
    
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class,'product_id');
    }

}
