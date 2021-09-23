<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RestraurantRequest;
use App\Notifications\BusinessAccountApproved;
use DB;

class RestraurantRequestController extends Controller
{
    
    private $data;
    public function __construct(RestraurantRequest $data)
    {
        $this->data = $data;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->data->latest()->get();
        return view("admin.restaurantRequest.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*return view('admin.menu_group.create');*/
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
            
            return back()->withSuccess("New menu group added");


        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RestraurantRequest  $data
     * @return \Illuminate\Http\Response
     */
    public function show(RestraurantRequest $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RestraurantRequest  $data
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        
        $data = $this->data->where('id',$id)->first();
        return view('admin.restaurantRequest.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RestraurantRequest  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validation($request);

        DB::beginTransaction();
        try {
            $this->data = $this->data->where('id',$id)->first();

            if($this->props($request)
            ->save()){
                if ($request->status) {
                    $this->data->notify(new BusinessAccountApproved());
                }
            }   
            
            DB::commit();
            
            return back()->withSuccess("Restaurant request updated");


        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RestraurantRequest  $menu_group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->data->where('id',$id)->delete();
        return back()->withSuccess('Restaurant request removed from database');
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
        $this->data->status= $request->status;
        return $this;
    }
    private function save()
    {
        $this->data->save();
        return $this;
    }

}
