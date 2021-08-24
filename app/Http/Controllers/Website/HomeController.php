<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuisine;
use App\Models\MenuItem;
use App\Models\Restaurant;
use Auth;

class HomeController extends Controller
{
    /*
    * Return redirect to home
    */
    public function index()
    {
        $data = [];
        $userId = Auth::id();

        $data['cuisine'] = Cuisine::where('status',1)->get();
        $data['menu_item'] = MenuItem::with('menu_price')->where('status',1)->get();
        $data['restro'] = Restaurant::with(['cuisin','wishlist'=> function ($query) use($userId)
        {
            $query->where('product_type','RESTRO')->where('user_id',$userId);   
        }])->where('status',1)->get();

    	return view('Website.home.index',compact('data'));
    }

    /*
    * Return redirect to about us page
    */
    public function aboutus()
    {
        return view('Website.staticPages.aboutus');
    }

}
