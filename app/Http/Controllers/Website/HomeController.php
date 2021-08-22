<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuisine;
use App\Models\MenuItem;
use App\Models\Restaurant;

class HomeController extends Controller
{
    /*
    * Return redirect to home
    */
    public function index()
    {
        $data = [];

        $data['cuisine'] = Cuisine::where('status',1)->get();
        $data['menu_item'] = MenuItem::with('menu_price')->where('status',1)->get();
        $data['restro'] = Restaurant::with('cuisin')->where('status',1)->get();
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
