<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class DeliveryBoyHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function scopeFilter($query)
    {
        if (Auth::user()->role===3) 
        {
            $query->where('user_id',Auth::id());   
        }
    }
}
