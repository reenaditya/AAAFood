<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use DB;

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
        return view('admin.restaurant.create');
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

     		$this->props($request)
     		->save();	
     		
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
        return view('admin.restaurant.update',compact('restaurant'));
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
     		
     		DB::commit();
     		
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
        $restaurant->delete();
        return back()->withSuccess('Restaurant removed from database');
    }
    private function validation(Request $request)
    {
    	$request->validate([
        	'name' => ["required","min:2","max:100"],
        	'address' => ['required','min:2','max:255'],
        	'description' => ['required','min:2','max:500'],
        	'city' => ['required','min:2','max:100'],
        	'zipcode' => ['required'],
        	'email' => ['required','email'],
        	'phone_number' => ['required'],
        	'image' => ["nullable","image"],
        	'status' => ["sometimes","boolean"],
        	'serve' => ["sometimes","boolean"],
        ]);
        return $this;
    }
    private function props(Request $request)
    {
    	$this->restaurant->name = $request->name;
    	if ($request->hasFile('image')) {
    	
        	$this->restaurant->image = $request->image->store('upload/restaurant','public');
    	}
    	$this->restaurant->address = $request->address;
    	$this->restaurant->description = $request->description;
    	$this->restaurant->city = $request->city;
    	$this->restaurant->zipcode = $request->zipcode;
    	$this->restaurant->email = $request->email;
    	$this->restaurant->phone_number = $request->phone_number;
    	$this->restaurant->serve = $request->serve?true:false;
        $this->restaurant->status = $request->status?true:false;
        return $this;
    }
    private function save()
    {
    	$this->restaurant->save();
    	return $this;
    }
}
