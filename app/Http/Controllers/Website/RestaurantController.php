<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CuisineRestaurant;
use App\Models\Restaurant;
use App\Models\Cuisine;
use App\Models\RestaurantOffer;
use App\Models\User;
use Hash;
use DB;
use Str;
use Auth;

class RestaurantController extends Controller
{
    private $restaurant;
    public function __construct(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
    }

    /*
    * business account view page
    */
    public function index()
    {
        $cuisine = Cuisine::where('status',1)->get();
        return view('Website.bussinessAccount.createRestro',compact('cuisine'));
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
            
            $user = new User;
            $user->name = $request->user_name;
            $user->email = $request->user_email;
            $user->role = 1;
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::login($user);
            $userId = $user->id;

            $adata = $this->props($request,$userId)
            ->save();
            
            $id = $this->restaurant->id;
            $cuisine = $request->cuisines;
            $this->addCusinRestro($id,$cuisine);
            if(isset($request->ac_offer_type) && $request->ac_offer_type==1){
                $oftype = 'AADINING_CLUB';
                $this->addRestaurantOffer($id,$request,$oftype);
            }
            if(isset($request->bc_offer_type) && $request->bc_offer_type==1){
                $oftype = 'BIRTHDAY_CLUB';
                $this->addRestaurantOffer($id,$request,$oftype);
            }
            DB::commit();
            
            return redirect()->route('webiste.home.index')->withSuccess("New restaurant added");

        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
    }

    private function validation(Request $request)
    {
        $request->validate([
            'user_name' => ["required","min:2","max:100"],
            'user_email' => ["required","min:2","max:100"],
            'password' => ["required","min:8","confirmed"],
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
            'status' => ["sometimes","boolean"],
            'image' => ["nullable","image"],
            'description' => ['required','min:2','max:500'],
        ]);
        return $this;
    }
    private function props(Request $request,$userId)
    {
        $cuisine = isset($request->cuisines) && !empty($request->cuisines) ? implode(",", $request->cuisines) : '';
        if ($request->hasFile('image')) {
            $this->restaurant->image = $request->image->store('upload/restaurant','public');
        }
        if ($request->hasFile('icon')) {
            $this->restaurant->icon = $request->icon->store('upload/restaurant','public');
        }
        if ($request->hasFile('banner_img')) {        
            $this->restaurant->banner_img = $request->banner_img->store('upload/restaurant','public');
        }
        $this->restaurant->user_id = $userId;
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
        $this->restaurant->ac_max_discount = $request->ac_max_discount;
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

    private function addRestaurantOffer($restoId,$request,$oftype){
        $add = new RestaurantOffer;
        $add->restaurant_id = $restoId;
        $add->offer_type = $oftype;
        if ($request->hasFile('ac_image') && $oftype=='AADINING_CLUB') {        
            $add->file = $request->ac_image->store('upload/restaurant','public');
            $add->offer_valid_day = !empty($request->ac_days)? json_encode($request->ac_days) :'';
            $add->offer_valid_from = $request->offer_valid_from!=null?$request->offer_valid_from :'';
            $add->offer_valid_to = $request->offer_valid_to!=null?$request->offer_valid_to :'';
            $add->terms_condition = json_encode($request->ac_terms_condition);
        }
        if($oftype=='BIRTHDAY_CLUB'){
            $add->terms_condition = json_encode($request->bc_terms_condition);   
        }
        $add->status = false;
        $add->save();
        return $this;
    }
}
