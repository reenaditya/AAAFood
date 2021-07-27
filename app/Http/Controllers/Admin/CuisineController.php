<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use Illuminate\Http\Request;
use DB;

class CuisineController extends Controller
{
	private $cuisine;

	public function __construct(Cuisine $cuisine)
	{
		$this->cuisine = $cuisine;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$cuisine = Cuisine::get();
        return view('admin.cuisine.index',compact('cuisine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cuisine.create');
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
     		
     		return back()->withSuccess("New cuisine added");


    	} catch (Exception $e) {
    		
    		DB::rollback();

    		return back()->withError($e->getMessage());
    	}

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuisine  $cuisine
     * @return \Illuminate\Http\Response
     */
    public function show(Cuisine $cuisine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuisine  $cuisine
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuisine $cuisine)
    {
       	return view('admin.cuisine.update',compact('cuisine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuisine  $cuisine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuisine $cuisine)
    {
    	$this->cuisine = $cuisine;

    	$this->validation($request);

        DB::beginTransaction();
    	try {
    		
    		$this->props($request)
     		->save();	
     		
     		DB::commit();
     		
     		return back()->withSuccess("Cuisine updated successfully");


    	} catch (Exception $e) {
    		
    		DB::rollback();

    		return back()->withError($e->getMessage());
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuisine  $cuisine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuisine $cuisine)
    {
        $cuisine->delete();
        return back()->withSuccess('Cuisine removed from database');
    }
    private function validation(Request $request,$cuisine = "")
    {
    	$request->validate([
        	'name' => ["required","min:2","max:255"],
        	'image' => ["nullable","image"],
        	'status' => ["sometimes","boolean"]
        ]);
        return $this;
    }
    private function props(Request $request)
    {
    	$this->cuisine->name = $request->name;
    	if ($request->hasFile('image')) {
    		$this->cuisine->image = $request->image->store('upload/cuisines','public');	
    	}
        $this->cuisine->status = $request->status?true:false;
        return $this;
    }
    private function save()
    {
    	$this->cuisine->save();
    	return $this;
    }
}
