<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuGroup;
use App\Models\User;
use App\Models\Restaurant;
use DB;

class MenuGroupController extends Controller
{
    private $data;
    public function __construct(MenuGroup $data)
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
        $data = $this->data->with('restaurant','user')->get();
        return view("admin.menu_group.index",compact('data'));
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
        return view('admin.menu_group.create',compact('restaurant','user'));
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
     * @param  \App\Models\MenuGroup  $data
     * @return \Illuminate\Http\Response
     */
    public function show(MenuGroup $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuGroup  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuGroup $menu_group)
    {
        $menu_group = $menu_group->with('restaurant','user')->where('id',$menu_group->id)->first();
        $user = User::get();
        $restaurant = Restaurant::get();
        return view('admin.menu_group.update',compact('menu_group','restaurant','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuGroup  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuGroup $menu_group)
    {
        $this->validation($request);

        DB::beginTransaction();
        try {
            $this->data = $menu_group;

            $this->props($request)
            ->save();   
            
            DB::commit();
            
            return back()->withSuccess("Menu group updated");


        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuGroup  $menu_group
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuGroup $menu_group)
    {
        $menu_group->delete();
        return back()->withSuccess('Menu Group removed from database');
    }
    private function validation(Request $request)
    {
        $request->validate([
            'name' => ["required","min:2","max:100"],
            'restaurant_id' => ['required'],
            'user_id' => ['required'],
        ]);
        return $this;
    }
    private function props(Request $request)
    {
        $this->data->name = $request->name;
        $this->data->restaurant_id = $request->restaurant_id;
        $this->data->user_id = $request->user_id;
        $this->data->status = $request->status?true:false;
        return $this;
    }
    private function save()
    {
        $this->data->save();
        return $this;
    }

}
