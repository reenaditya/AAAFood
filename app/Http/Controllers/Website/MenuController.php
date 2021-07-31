<?php

namespace App\Http\Controllers\Website;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\MenuGroup;

class MenuController extends Controller
{
    /*
    * Return redirect to menu
    */
    public function index(Request $request)
    {
        $restaurant = Restaurant::where('slug',$request->slug)->first();
        $restaurant_id = $restaurant->id;

        $data = MenuGroup::with('menuItems')->where('restaurant_id',$restaurant->id)->get();
        return view('Website.menu.index',compact('data','restaurant'));
    }
}
