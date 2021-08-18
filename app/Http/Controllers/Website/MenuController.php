<?php

namespace App\Http\Controllers\Website;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\MenuGroup;
use App\Models\Cuisine;

class MenuController extends Controller
{
    /*
    * Return redirect to menu
    */
    public function index(Request $request)
    {
        $restaurant = Restaurant::where('slug',$request->slug)->first();
        $data = MenuGroup::with('menuItems.menu_price')
            ->where('restaurant_id',$restaurant->id)
            ->where('status',1)
            ->get();
        return view('Website.menu.index',compact('data','restaurant'));
    }

    /*
    *Redirect to restaurant list 
    */
    public function restaurantList(Request $request)
    {
        $restaurants = Cuisine::where('id',$request->id)->first();
        return view('Website.restaurant.index',compact('restaurants'));
    }    
}
