<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public function restro()
    {
        return $this->hasOne(Restaurant::class,'restro_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'user_id');
    }
}
