<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItemsPriceQuantity extends Model
{
    use HasFactory;

    public function quantity_group()
    {
        return $this->belongsTo(MenuQuantityGroup::class, 'menu_quantity_group_id');
    }

    public function menu_item()
    {
        return $this->belongsTo(MenuItem::class, 'menu_item_id');
    }
}
