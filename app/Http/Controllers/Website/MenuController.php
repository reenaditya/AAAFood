<?php

namespace App\Http\Controllers\Website;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\MenuGroup;
use App\Models\Cuisine;
use App\Models\Cart;

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

    /*
    * Store item to cart
    */
    public function addToCart(Request $request)
    {
        $input = $request->all();
        $data = isset($input['data']) && !empty($input['data']) ? $input['data'] :false;
        $userId = isset($input['user_id']) ? $input['user_id'] :false;
        $restroId = isset($input['restro_id']) ? $input['restro_id'] :false;
        if ($data==false) {
            Cart::where('user_id',$userId)->where('restaurant_id',$restroId)->delete();
        }
        $existed = Cart::where('user_id',$userId)->where('restaurant_id',$restroId)->first();

        if ($existed!=null) {
            $add = $existed;
        }else{
            $add = new Cart;
        }
        if ($userId && $restroId) {
            $add->user_id = $userId;
            $add->restaurant_id = $restroId;
            $add->data = $input['data'];
            $add->total_amount = $input['totalAmt'];
            if ($add->save()) {
                $response['status'] = true;
                $response['message'] =  'Successfully.';
            }else{
                $response['status'] = false;
                $response['message'] =  'Somethong went wrong!';
            }
        }else{
            $response['status'] = false;
            $response['message'] =  'User not found!';
        }
        
        return response()->json($response);
    }

    /*
    * Get all data according to category like top-rated,trending
    */
    public function listCategoryWise(Request $request)
    {
        $data = Restaurant::where('status',1);
        if ($request->has('category') && $request->category=='top-rated'){
            $data = $data->where('top_rated',1);
        }
        elseif($request->has('category') && $request->category=='new'){
            $data = $data->where('new',1);
        }
        elseif($request->has('category') && $request->category=='trending'){
            $data = $data->where('trending',1);
        }
        elseif($request->has('category') && $request->category=='dine-in'){
            $data = $data->where('dine_in',1);
        }
        elseif($request->has('category') && $request->category=='delivery'){
            $data = $data->where('own_delivery',1);
        }
        elseif($request->has('category') && $request->category=='catering'){
        }
        elseif($request->has('category') && $request->category=='pickup'){
            $data = $data->where('takeout',1);
        }

        $data = $data->latest()->get();
        return view('Website.restaurant.restaurant',compact('data'));        
    }
}
