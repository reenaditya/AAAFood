<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberFirstPurchase extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }

    public function vendor()
    {
        return $this->belongsTo(user::class,'vendor_id');
    }


    public function restro()
    {
        return $this->belongsTo(Restaurant::class,'restaurant_id');
    }
}
