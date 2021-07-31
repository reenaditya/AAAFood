<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\MenuQuantityGroup;
use App\Models\MenuItemsPriceQuantity;
use DB;

class MenuItemPriceQuantityController extends Controller
{
    
    private $data;
    public function __construct(MenuItemsPriceQuantity $data)
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
        $data = $this->data->with('quantity_group','menu_item')->get();
        return view("admin.menu_item_price_quantity.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_item = MenuItem::where('status',1)->get();
        $quantity_group = MenuQuantityGroup::where('status',1)->get();
        return view('admin.menu_item_price_quantity.create',compact('menu_item','quantity_group'));
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
     * @param  \App\Models\MenuItemsPriceQuantity  $data
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItemsPriceQuantity $MenuItemsPriceQuantity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuItemsPriceQuantity  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItemsPriceQuantity $menu_item_price_quantity)
    {
        $data = $menu_item_price_quantity->with('menu_item','quantity_group')->where('id',$menu_item_price_quantity->id)->first();
        $menu_item = MenuItem::where('status',1)->get();
        $quantity_group = MenuQuantityGroup::where('status',1)->get();
        
        return view('admin.menu_item_price_quantity.update',compact('menu_item','quantity_group','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuItemsPriceQuantity  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuItemsPriceQuantity $menu_item_price_quantity)
    {
        $this->validation($request);

        DB::beginTransaction();
        try {
            $this->data = $menu_item_price_quantity;
              
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
     * @param  \App\Models\MenuItemsPriceQuantity  $menu_item_price_quantity
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItemsPriceQuantity $menu_item_price_quantity)
    {
        $menu_item_price_quantity->delete();
        return back()->withSuccess('Menu quantity group removed from database');
    }

    private function validation(Request $request)
    {
        $request->validate([
            'price' => ["required","min:2","max:100"],
            'menu_item_id' => ['required'],
            'menu_quantity_group_id' => ['required'],
        ]);
        return $this;
    }
    private function props(Request $request)
    {
        $this->data->price = $request->price;
        $this->data->menu_quantity_group_id = $request->menu_quantity_group_id;
        $this->data->menu_item_id = $request->menu_item_id;
        $this->data->status = $request->status?true:false;
        return $this;
    }
    private function save()
    {
        $this->data->save();
        return $this;
    }

}
