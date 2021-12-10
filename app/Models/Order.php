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

    public function rating()
    {
        return $this->hasMany(Rating::class,'order_id');
    }

    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class,'order_id');
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
        return $this->hasOne(Transaction::class,'order_id');
    }

    public function scopeOnlyPayonAcc($query){
        $query->whereHas('transaction',function ($query)
        {
            $query->where('type',3)->where('pay_mode',3);
        });   
    } 

    public function scopeIsearch($query,$search)
    {
        $query->whereHas('user',function ($query) use($search)
        {
            where('user_code','LIKE','%'.$search.'%');
        });
    }

    public function scopeFilterOrder($query,$request='')
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
        if ($request->user_id) {
            $query->where('user_id',$request->user_id);
        }
    }

    public function scopeFilterNewOrder($query,$request='')
    {
        //role==3 will be delivery
        if (Auth::user()->role===3) 
        {
            if (Auth::user()->email_verified_at) 
            {
                    
                $deliveryBoy = Auth::user()->deliveryBoyLocation;
                if ($deliveryBoy->is_busy) {
                    $query->whereIn('order_status',[2,3,4,5])->where('delivery_user_id',Auth::id());
                }else{
                    $city = $deliveryBoy && $deliveryBoy->status==1 ? $deliveryBoy->city: 'no city found';
                    $query->whereIn('order_status',[2,3])->where('address','LIKE','%'.$city.'%')->whereNull('delivery_user_id')->where('delivery_type',1);
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
        elseif (Auth::user()->role===2) 
        {
            $query->whereIn('order_status',[1,2,3,4]);
        }

        if ($request->user_id) {
            $query->where('user_id',$request->user_id);
        }
    }

    public function scopeFilterCompletedOrder($query,$request='')
    {
        if (Auth::user()->role===3) 
        {
            $query->whereIn('order_status',[7])->where('delivery_user_id',Auth::id());
        }
        elseif (Auth::user()->role===1) 
        {
            $query->whereIn('order_status',[7])->where('vendor_id',Auth::id());
        }
        elseif (Auth::user()->role===2) 
        {
            $query->whereIn('order_status',[7]);
        }
        if ($request->paymode=="poa") {
            $query->whereHas('transaction',function ($query)
            {
                $query->where('pay_mode',3)->where('type',3);   
            });
        }
        if ($request->user_id) {
            $query->where('user_id',$request->user_id);
        }
    }
}
