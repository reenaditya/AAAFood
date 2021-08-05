<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuQuantityGroup;
use App\Models\MenuItem;
use App\Models\MenuGroup;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\MenuItemsPriceQuantity;
use DB;
use Auth;

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
        $restaurant = Restaurant::select('id')->where('user_id',Auth::id())->first();
        $group = MenuGroup::where('restaurant_id',$restaurant->id)->where('user_id',Auth::id())->where('status',1)->get();
        return view('admin.menu_item.create',compact('group'));
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

            $menu_item_id = $this->props($request)
            ->save();   
            $menu_item_id = $menu_item_id->data->id;
            $update = false;
            $this->menuQuantityPrice($menu_item_id,$request,$update);
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
        $menu_item = $menu_item->with('restaurant','user','menu_group','menu_price')->where('id',$menu_item->id)->first();
        $restaurant = Restaurant::select('id')->where('user_id',Auth::id())->first();
        $group = MenuGroup::where('restaurant_id',$restaurant->id)->where('user_id',Auth::id())->where('status',1)->get();

        return view('admin.menu_item.update',compact('menu_item','group'));
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

            $update = true;
            $this->menuQuantityPrice($menu_item->id,$request,$update);

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
            'menu_group_id' => ['required'],
            'estimated_time' => ['required'],
            'discount' => ['required'],
            'discount_type' => ['required'],
        ]);
        return $this;
    }
    private function props(Request $request)
    {
        $restaurant = Restaurant::where('user_id',Auth::id())->first();
        $this->data->name = $request->name;
        if ($request->hasFile('image')) {
            $this->data->image = $request->image->store('upload/menu_item','public');
        }
        $this->data->restaurant_id = $restaurant->id;
        $this->data->user_id = Auth::id();
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

    private function menuQuantityPrice($menu_item_id,$request,$update){
        if ($update) {
            MenuItemsPriceQuantity::whereIn('menu_quantity_group_id',$request->mqg_id)->delete();
        }
        $data = [];
        $counts = count($request->mqg_id);
        if ($counts >=1) {
            for ($i=0; $i < $counts; $i++) { 
                $data[$i]['menu_quantity_group_id'] = $request->mqg_id[$i];
                $data[$i]['menu_item_id'] = $menu_item_id;
                $data[$i]['price'] = $request->price[$i];
            }
            MenuItemsPriceQuantity::insert($data);
        }
        return true;
    }

    /*
    * Get Menu Group Quantity
    */
    public function menuGroupQuantity(Request $request)
    {
        $input = $request->all();
        $menu_group_id = isset($input['menu_group_id']) && !empty($input['menu_group_id']) ? $input['menu_group_id'] : false;
        if($menu_group_id){
            $mgq = MenuQuantityGroup::where('menu_group_id',$menu_group_id)->where('status',1)->get();
            
            if (!$mgq->isEmpty()) {
                $response['status'] = true;
                $response['message'] =  'Successfully';
                $response['data'] =  $mgq;
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
