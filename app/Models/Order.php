<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    public function orderItem()
    {
        return $this->hasMany(OrderDetail::class,'order_id')->with('menuItem');
    }


    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }


    public function vendor()
    {
        return $this->belongsTo(user::class,'vendor_id');
    }


    public function deliveryUser()
    {
        return $this->belongsTo(user::class,'delivery_user_id');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class,'restaurant_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'order_id');
    }

    public function scopeFilterOrder($query)
    {
        //role==3 will be delivery
        $user_id = Auth::id();
        if (Auth::user()->role===3) 
        {
            $query->where('delivery_user_id',Auth::id());   
        }
        elseif (Auth::user()->role===1) 
        {
            $query->where('vendor_id',Auth::id());
        }
    }

    public function scopeFilterNewOrder($query)
    {
        //role==3 will be delivery
        if (Auth::user()->role===3) 
        {
            if (Auth::user()->email_verified_at) 
            {
                    
                $deliveryBoy = Auth::user()->deliveryBoyLocation;
                if ($deliveryBoy->is_busy) {
                    $query->whereIn('order_status',[2,3,4])->where('delivery_user_id',Auth::id());
                }else{
                    $city = $deliveryBoy && $deliveryBoy->status==1 ? $deliveryBoy->city: 'no city found';
                    $query->whereIn('order_status',[2,3])->where('address','LIKE','%'.$city.'%')->whereNull('delivery_user_id');
                }
            }
            else
            {
                $query->limit(0);
            }
        }
        elseif (Auth::user()->role===1) 
        {
            $query->whereIn('order_status',[1,2,3,4])->where('vendor_id',Auth::id());
        }
    }

    public function scopeFilterCompletedOrder($query)
    {
        if (Auth::user()->role===3) 
        {
            $query->whereIn('order_status',[7])->where('delivery_user_id',Auth::id());
        }
        elseif (Auth::user()->role===1) 
        {
            $query->whereIn('order_status',[7])->where('vendor_id',Auth::id());
        }
    }
}
