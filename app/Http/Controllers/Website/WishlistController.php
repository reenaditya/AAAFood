<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    
    /*
    * add to wish list
    */
    public function addToWishList(Request $request)
    {
        $input = $request->all();
        $user_id = $input['user_id'];
        $restro_id = $input['restro_id'];
        $type = $input['type'];
        
        $response = [];
        if(empty($user_id) || empty($restro_id) || empty($type)){
            $response['status'] = false;
        }else{
            $deleted = Wishlist::where('product_id',$restro_id)->where('product_type',$type)->where('user_id',$user_id);
            if ($deleted->delete()) {
                $response['status'] = true;
                $response['message'] = "Successfully changed";
            }else{
                $add = new Wishlist;
                $add->user_id = $user_id;
                $add->product_id = $restro_id;
                $add->product_type = $type;
                if ($add->save()) {
                    $response['status'] = true;
                    $response['message'] = "Successfully changed";
                }else{
                    $response['status'] = false;
                }
            }
        }
        return response()->json($response);
    }
    
}
