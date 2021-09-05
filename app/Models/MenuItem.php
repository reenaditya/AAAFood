<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }

    public function menu_group()
    {
        return $this->belongsTo(MenuGroup::class, 'menu_group_id');
    }
/*
    public function menuQuntPrice()
    {
        return $this->hasMany(MenuItemsPriceQuantity::class, 'menu_item_id');
    }*/

     public function menu_price(){
        return $this->belongsToMany(MenuQuantityGroup::class,'menu_items_price_quantities','menu_item_id','menu_quantity_group_id')->withPivot('price');
    }

    public function scopeIsearch($query,$value='')
    {
        if ($value) {
            $query->where('name','LIKE','%'.$value.'%');
        }
    }

}
