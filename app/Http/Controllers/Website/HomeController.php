<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Cuisine;
use App\Models\MenuItem;
use App\Models\Restaurant;
use App\Models\Catering;
use App\Models\User;
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
        $data['1by2meal'] = MenuItem::where('special',1)->where('status',1)->get();
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


    /*
    * Get all restaurant data 
    */
    public function searchRestro(Request $request)
    {
        $input = $request->all();
        $type = '';
        $value = isset($input['value']) && !empty($input['value']) ? $input['value']:false;
        if ($value) {
            $data = MenuItem::isearch($value)->latest()->get();
            if(!$data->isEmpty()){
                $data = collect($data)->unique('name');
                $type = 'ITEM';
            }else{
                $data = Restaurant::rsearch($value)->latest()->get();
                $type = 'RESTRO';
            }
            if (!$data->isEmpty()) {
                $response['status'] = true;
                $response['message'] =  'Successful';   
                $response['data'] =  $data; 
                $response['type'] =  $type;
            }else{
                $response['status'] = false;
                $response['message'] =  'No data found!';
            }
        }else{
            $response['status'] = false;
            $response['message'] =  'No data found!';
        }
        
        return response()->json($response);
    }

    
    /*
    * Home page searching redirection
    */
    public function homeSearch(Request $request)
    {
        $input = $request->all();

        if ($input['type']=='ITEM') 
        {
            $url = url('restaurants/').'?type=item&name='.$input['search'];
            return redirect($url);   
        }

        if ($input['type']=='RESTRO' && !empty($input['slug'])) 
        {
            $url = url('menu/'.$input['slug']);
            return redirect($url);
        }
    }

    /*
    * view delivery boy account
    */
    public function deliveryAcc()
    {
        return view('auth.delivery_account');
    }

    /*
    * view caterings single 
    */
    public function catering()
    {
        $data = Catering::whereStatus(1)->get();
        return view('Website.catering.index',compact('data'));
    }

    /*
    * view caterings list
    */
    public function cateringView($catering)
    {   
        $catering = Catering::where('id',$catering)->first();
        return view('Website.catering.view',compact('catering'));
    }


    public function usercode()
    {
        $usercode = User::whereNull('user_code')->get();
        foreach ($usercode as $key => $value) {
            $code = date("Ym").rand(1,999).$value->id;
            User::where("id",$value->id)->update(['user_code'=>$code]);
        }
        return 'done';
    }
}


