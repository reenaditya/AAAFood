<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RestraurantRequest;
use DB;
class BussinessAccountController extends Controller
{
    private $data;
    public function __construct(RestraurantRequest $data)
    {
        $this->data = $data;
    }

    /*
    * business account view page
    */
    public function create()
    {
        return view('Website.bussinessAccount.index');
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
            
            return redirect()->back()->withSuccess("Thank you for your intrest, one of our team members will reach out to you within 24hrs.");

        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
    }

    private function validation(Request $request)
    {
        $request->validate([
            'firstname' => ["required","min:2","max:100"],
            'lastname' => ["required","min:2","max:100"],
            'email' => ["required"],
            'phone_number' => ["required","min:8","max:20"],
            'restaurant_name' => ['required','min:2','max:255'],
            'food_type' => ['required','min:2','max:255'],
            'restaurant_address' => ['required','min:2','max:255'],
        ]);
        return $this;
    }
    private function props(Request $request)
    {
        
        $this->data->fname = $request->firstname;
        $this->data->lname = $request->lastname;
        $this->data->email = $request->email;
        $this->data->phone_number = $request->phone_number;
        $this->data->restaurant_name = $request->restaurant_name;
        $this->data->food_type = $request->food_type;
        $this->data->restaurant_address = $request->restaurant_address;
        $this->data->comments= $request->comments;
        $this->data->status= false;
        return $this;
    }
    private function save()
    {
        $this->data->save();
        return $this;
    }
}
