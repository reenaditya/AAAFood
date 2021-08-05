<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CuisineRestaurant;
use App\Models\Restaurant;
use App\Models\Cuisine;
use App\Models\User;
use DB;
use Str;
class RestaurantController extends Controller
{
	private $restaurant;
	public function __construct(Restaurant $restaurant)
	{
		$this->restaurant = $restaurant;
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$restaurants = $this->restaurant->get();

        return view("admin.restaurant.index",compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::select('id','name')->get();
        $cuisine = Cuisine::select('id','name')->where('status',1)->get();
        return view('admin.restaurant.create',compact('cuisine','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validation($request);

        DB::beginTransaction();
    	try {

     		$adata = $this->props($request)
     		->save();
     		
            $id = $this->restaurant->id;
            $cuisine = $request->cuisines;
            $this->addCusinRestro($id,$cuisine);

     		DB::commit();
     		
     		return back()->withSuccess("New restaurant added");


    	} catch (Exception $e) {
    		
    		DB::rollback();

    		return back()->withError($e->getMessage());
    	}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $user = User::select('id','name')->get();
        $cuisine = Cuisine::select('id','name')->where('status',1)->get();
        return view('admin.restaurant.update',compact('restaurant','cuisine','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $this->validation($request);

        DB::beginTransaction();
    	try {
    		$this->restaurant = $restaurant;

     		$this->props($request)
     		->save();

            $id = $this->restaurant->id;
            $cuisine = $request->cuisines;
     		
            DB::commit();
            $this->removeCusinRestro($id);
            $this->addCusinRestro($id,$cuisine);
     		
     		return back()->withSuccess("Restaurant updated");


    	} catch (Exception $e) {
    		
    		DB::rollback();

    		return back()->withError($e->getMessage());
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        if ($restaurant->participate_file) {
            
        }
        $restaurant->delete();
        return back()->withSuccess('Restaurant removed from database');
    }
    private function validation(Request $request)
    {
    	$request->validate([
            'user_id' => ["required"],
        	'name' => ["required","min:2","max:100"],
            'location' => ['required','min:2'],
            'address' => ['required','min:2','max:255'],
        	'address2' => ['required','min:2','max:255'],
            'city' => ['required','min:2','max:100'],
            'state' => ['required','min:2','max:100'],
            'country' => ['required','min:2','max:100'],
            'sale_tax' => ['required'],
            'seating_capacity_indoor' => ['required'],
            'seating_capacity_outdoor' => ['required'],
            'mf_from' => ['required'],
        	'status' => ["sometimes","boolean"],
        	'image' => ["nullable","image"],
            'description' => ['required','min:2','max:500'],
        ]);
        return $this;
    }
    private function props(Request $request)
    {
        $cuisine = isset($request->cuisines) && !empty($request->cuisines) ? implode(",", $request->cuisines) : '';
    	if ($request->hasFile('image')) {
    		$this->restaurant->image = $request->image->store('upload/restaurant','public');
    	}
        $this->restaurant->user_id = $request->user_id;
        $this->restaurant->name = $request->name;
    	$this->restaurant->slug = Str::slug($request->name,'-');
        $this->restaurant->cuisines = $cuisine;
        $this->restaurant->location = $request->location;
        $this->restaurant->address = $request->address;
        $this->restaurant->address2 = $request->address2;
    	$this->restaurant->city = $request->city;
        $this->restaurant->state = $request->state;
        $this->restaurant->country = $request->country;
    	$this->restaurant->zipcode= $request->zipcode;
    	$this->restaurant->website = $request->website;
        $this->restaurant->sale_tax = $request->sale_tax;
        $this->restaurant->dine_in = $request->dine_in;
        $this->restaurant->seating_capacity_indoor = $request->seating_capacity_indoor;
        $this->restaurant->seating_capacity_outdoor = $request->seating_capacity_outdoor;
        $this->restaurant->reservations = $request->reservations;
        $this->restaurant->reservation_system = $request->reservation_system;
        $this->restaurant->takeout = $request->takeout;
        $this->restaurant->own_delivery = $request->own_delivery;
        $this->restaurant->delivery_fee = $request->delivery_fee;
        $this->restaurant->minimum_delivery_amount = $request->minimum_delivery_amount;
        $this->restaurant->free_delivery_amount = $request->free_delivery_amount;
        $this->restaurant->delivery_radius = $request->delivery_radius;
        $this->restaurant->delivery_zip_codes = $request->delivery_zip_codes;
        $this->restaurant->order_lead_time = $request->order_lead_time;
        $this->restaurant->delivery_extra_time = $request->delivery_extra_time;
        $this->restaurant->delivery_service = $request->delivery_service;
        if ($request->hasFile('participate_file')) {        
            $this->restaurant->participate_file = $request->participate_file->store('upload/restaurant','public');
        }
        
        $this->restaurant->aaadining_club = $request->aaadining_club;
        $this->restaurant->birthday_club = $request->birthday_club;
        $this->restaurant->mf_from = $request->mf_from;
        $this->restaurant->mf_to = $request->mf_to;
        $this->restaurant->sat_from = $request->sat_from;
        $this->restaurant->sat_to = $request->sat_to;
        $this->restaurant->sun_from = $request->sun_from;
        $this->restaurant->sun_to = $request->sun_to;
        $this->restaurant->description = $request->description;
    	$this->restaurant->serve = $request->serve?true:false;
        $this->restaurant->status = $request->status?true:false;
        return $this;
    }
    private function save()
    {
    	$this->restaurant->save();
    	return $this;
    }

    private function addCusinRestro($id,$cuisine)
    {
        $add = [];
        if (!empty($cuisine)) {
            foreach ($cuisine as $key => $value) {
                $add[$key]['cuisine_id'] = $value;
                $add[$key]['restaurant_id'] = $id;
                $add[$key]['created_at'] = date('Y-m-d H:i');
            }
            CuisineRestaurant::insert($add);
        }
        return $this;
    }

    private function removeCusinRestro($id)
    {
        CuisineRestaurant::where('restaurant_id',$id)->delete();
        return 1;
    }
}
