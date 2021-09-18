<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryBoyLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'user_id',
        'latitude',
        'longitude',
        'status',
        'is_busy',
        'total_delivery',
    ];

}
