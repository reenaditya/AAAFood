<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuGroup;
use App\Models\MenuQuantityGroup;
use App\Models\User;
use App\Models\Restaurant;
use DB;
use Auth;

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
        $data = $this->data->with('restaurant','user','menu_group')->where('user_id',Auth::id())->get();
        return view("admin.menu_quanity_group.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurant = Restaurant::select('id')->where('user_id',Auth::id())->first();
        $group = MenuGroup::where('restaurant_id',$restaurant->id)->where('user_id',Auth::id())->where('status',1)->get();
        return view('admin.menu_quanity_group.create',compact('group'));
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
        $menu_quantity_group = $menu_quantity_group->with('restaurant','user','menu_group')->where('id',$menu_quantity_group->id)->first();
        $restaurant = Restaurant::select('id')->where('user_id',Auth::id())->first();
        $group = MenuGroup::where('restaurant_id',$restaurant->id)->where('user_id',Auth::id())->where('status',1)->get();
        
        return view('admin.menu_quanity_group.update',compact('menu_quantity_group','group'));
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
            'menu_group_id' => ['required'],
        ]);
        return $this;
    }
    private function props(Request $request)
    {
        $restaurant = Restaurant::select('id')->where('user_id',Auth::id())->first();
        $this->data->name = $request->name;
        $this->data->restaurant_id = $restaurant->id;
        $this->data->user_id = Auth::id();
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
