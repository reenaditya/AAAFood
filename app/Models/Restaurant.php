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

    public function getMultipleMenuItem()
    {
        return $this->hasMany(MenuItem::class,'restaurant_id','id');
    }

    /*
    * Search restaurant data > Using for home search page
    */
    public function scopeRsearch($query,$value='')
    {
        if ($value) {
            $query->where('name','LIKE','%'.$value.'%');
        }
    }

    /*
    * get Restoutrant according to item
    */
    public function scopeValidateItem($query, $value='')
    {
        if ($value) {
            $query->whereHas('getMultipleMenuItem',function ($query) use($value)
            {
                $query->where('name','LIKE','%'.$value.'%');        
            });
        }
    }


    public function scopeFilterData($query)
    {
        if (Auth::check() && Auth::user()->role==1) {
            $query->where('user_id',Auth::id());
        }
    }

}
