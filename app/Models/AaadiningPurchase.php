<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AaadiningPurchase extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function MemberFirstPurchase()
    {
        return $this->hasOne(MemberFirstPurchase::class, 'user_id','user_id')->with('restro');
    }
}
