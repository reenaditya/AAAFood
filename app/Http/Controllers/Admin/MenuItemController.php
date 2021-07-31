<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\MenuGroup;
use App\Models\User;
use App\Models\Restaurant;
use DB;

class MenuItemController extends Controller
{
    
    private $data;
    public function __construct(MenuItem $data)
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
        $data = $this->data->with('restaurant','user','menu_group')->get();
        return view("admin.menu_item.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::get();
        $restaurant = Restaurant::get();
        $group = MenuGroup::where('status',1)->get();
        return view('admin.menu_item.create',compact('restaurant','user','group'));
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
            
            return back()->withSuccess("New Menu item added");


        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuItem  $data
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $MenuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuItem  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menu_item)
    {
        $menu_item = $menu_item->with('restaurant','user','menu_group')->where('id',$menu_item->id)->first();
        $user = User::get();
        $restaurant = Restaurant::get();
        $group = MenuGroup::where('status',1)->get();

        return view('admin.menu_item.update',compact('menu_item','restaurant','user','group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuItem  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuItem $menu_item)
    {
        $this->validation($request);

        DB::beginTransaction();
        try {
            $this->data = $menu_item;
            
            /* REMOVE IMAGE */
            if ($request->hasFile('image')) {
                unlink("storage/".$menu_item->image);
            }
              
            $this->props($request)
            ->save();   
            
            DB::commit();
            
            return back()->withSuccess("Menu item updated");


        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuItem  $menu_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItem $menu_item)
    {
        if ($menu_item->image) {
            unlink("storage/".$menu_item->image);
        }
        $menu_item->delete();
        return back()->withSuccess('Menu item removed from database');
    }

    private function validation(Request $request)
    {
        $request->validate([
            'name' => ["required","min:2","max:100"],
            'restaurant_id' => ['required'],
            'user_id' => ['required'],
            'menu_group_id' => ['required'],
            'estimated_time' => ['required'],
            'discount' => ['required'],
        ]);
        return $this;
    }
    private function props(Request $request)
    {
        $this->data->name = $request->name;
        if ($request->hasFile('image')) {
            $this->data->image = $request->image->store('upload/menu_item','public');
        }
        $this->data->restaurant_id = $request->restaurant_id;
        $this->data->user_id = $request->user_id;
        $this->data->menu_group_id = $request->menu_group_id;
        $this->data->estimated_time = $request->estimated_time;
        $this->data->discount = $request->discount;
        $this->data->discount_type = $request->discount_type;
        $this->data->status = $request->status?true:false;
        return $this;
    }
    private function save()
    {
        $this->data->save();
        return $this;
    }


    /*
    * Get Menu Group
    */
    public function menuGroup(Request $request)
    {
        $input = $request->all();
        $restaurant_id = isset($input['restaurant_id']) && !empty($input['restaurant_id']) ? $input['restaurant_id'] : false;
        if($restaurant_id){
            $menugroup = MenuGroup::where('restaurant_id',$restaurant_id)->where('status',1)->get();
            
            if (!$menugroup->isEmpty()) {
                $response['status'] = true;
                $response['message'] =  'Successfully';
                $response['data'] =  $menugroup;
            }else{
                $response['status'] = false;
                $response['message'] =  'Somethong went wrong';
            }
        }
        else{
            $response['status'] = false;
            $response['message'] =  'Somethong went wrong';
        }
        return response()->json($response);
    }

}
