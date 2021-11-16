<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['order_id','sender_id','reciver_id','vendor_id','message'];

    public function sender()
    {
        return $this->hasOne(User::class,'id','sender_id');
    }
}
