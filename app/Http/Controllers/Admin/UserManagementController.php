<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Hash;
use DB;
use Auth;

class UserManagementController extends Controller
{
    private $data;
    public function __construct(User $data)
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
        return view("admin.user.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            
            return back()->withSuccess("New user added");


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
     * @param  \App\Models\User  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data = $user;
        return view('admin.user.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validation($request);

        DB::beginTransaction();
        try {
            $this->data = $user;

            $this->props($request)
            ->save();   
            
            DB::commit();
            
            return back()->withSuccess("User updated");


        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->withSuccess('Menu Group removed from database');
    }
    
    private function validation(Request $request)
    {
        $request->validate([
            'role' => ["required"],
            'name' => ["required","min:2","max:100"],
            'email' => ["required","regex:/^.+@.+$/i"],
            /*'password' => ["required","confirmed","min:8"],*/
        ]);
        return $this;
    }
    
    private function props(Request $request)
    {
        $this->data->name = $request->name;
        $this->data->email = $request->email;
        $this->data->role = $request->role;
        $this->data->password = Hash::make($request->password);
        $this->data->status = $request->status?true:false;
        return $this;
    }

    private function save()
    {
        $this->data->save();
        return $this;
    }

    public function loginasUser(Request $request, $id)
    {
        $user_id = Auth::id();
        if (Auth::user()->role==2) {
            Session::put('previous_user_id',$user_id);
        }else{
            Session::flush('previous_user_id');
        }

        Auth::loginUsingId($id);

        return redirect()->route('admin.dashboard.index');
    }
}
