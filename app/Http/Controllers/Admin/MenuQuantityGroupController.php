<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuGroup;
use App\Models\MenuQuantityGroup;
use App\Models\User;
use App\Models\Restaurant;
use DB;

class MenuQuantityGroupController extends Controller
{
    
    private $data;
    public function __construct(MenuQuantityGroup $data)
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
        return view("admin.menu_quanity_group.index",compact('data'));
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
        return view('admin.menu_quanity_group.create',compact('restaurant','user','group'));
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
            
            return back()->withSuccess("New Menu quantity group added");


        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuQuantityGroup  $data
     * @return \Illuminate\Http\Response
     */
    public function show(MenuQuantityGroup $MenuQuantityGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuQuantityGroup  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuQuantityGroup $menu_quantity_group)
    {
        $menu_quantity_group = $menu_quantity_group->with('restaurant','user','menu_group')->first();
        $user = User::get();
        $restaurant = Restaurant::get();
        $group = MenuGroup::where('status',1)->get();

        return view('admin.menu_quanity_group.update',compact('menu_quantity_group','restaurant','user','group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuQuantityGroup  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuQuantityGroup $menu_quantity_group)
    {
        $this->validation($request);

        DB::beginTransaction();
        try {
            $this->data = $menu_quantity_group;
              
            $this->props($request)
            ->save();   
            
            DB::commit();
            
            return back()->withSuccess("Menu quantity group updated");


        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuQuantityGroup  $menu_quantity_group
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuQuantityGroup $menu_quantity_group)
    {
        $menu_quantity_group->delete();
        return back()->withSuccess('Menu quantity group removed from database');
    }

    private function validation(Request $request)
    {
        $request->validate([
            'name' => ["required","min:2","max:100"],
            'restaurant_id' => ['required'],
            'user_id' => ['required'],
            'menu_group_id' => ['required'],
        ]);
        return $this;
    }
    private function props(Request $request)
    {
        $this->data->name = $request->name;
        $this->data->restaurant_id = $request->restaurant_id;
        $this->data->user_id = $request->user_id;
        $this->data->menu_group_id = $request->menu_group_id;
        $this->data->status = $request->status?true:false;
        return $this;
    }
    private function save()
    {
        $this->data->save();
        return $this;
    }

}
