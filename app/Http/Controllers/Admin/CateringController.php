<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catering;
use DB;

class CateringController extends Controller
{

    private $data;
    public function __construct(Catering $data)
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
        $data = $this->data->get();
        return view('admin.catering.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catering.create');
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
            
            return back()->withSuccess("Catering added");


        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Catering $catering)
    {
        $data = $catering->where('id',$catering->id)->first();
        return view('admin.catering.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Catering $catering)
    {
        $update=true;
        $this->validation($request,$update);

        DB::beginTransaction();
        try {
            $this->data = $catering;

            $this->props($request)
            ->save();   
            
            DB::commit();
            
            return back()->withSuccess("Catering updated");


        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catering $catering)
    {
        $catering->delete();
        return back()->withSuccess('Catering removed from database');
    }


    private function validation(Request $request,$update=false)
    {
        if ($update) {
            $request->validate([
                'name' => ["required","min:2","max:100"],
                'description' => ["required","min:10"],
                'status' => ["required"],
            ]);    
        }else{
            
            $request->validate([
                'name' => ["required","min:2","max:100"],
                'description' => ["required","min:10"],
                'status' => ["required"],
                'logo' => ["required"],
                'banner' => ["required"],
            ]);
        }
        return $this;
    }
    

    private function props(Request $request)
    {
        $this->data->name = $request->name;
        $this->data->desc = $request->description;
        $this->data->status = $request->status?true:false;

        if ($request->hasFile('logo')) {
            $this->data->logo = $request->logo->store('upload/catering','public');
        }
        if ($request->hasFile('banner')) {
            $this->data->banner = $request->banner->store('upload/catering','public');
        }
        return $this;
    }
    

    private function save()
    {
        $this->data->save();
        return $this;
    }


}
