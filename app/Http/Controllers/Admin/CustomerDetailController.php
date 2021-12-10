<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use DB;
use Auth;

class CustomerDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customerdetail.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $input = $request->all();
        $search = isset($input['search']) && !empty($input['search']) ? $input['search']:false;
        if ($search) {
            $data = Order::with('user')->isearch($search)->latest()->get();
            if(!$data->isEmpty()){
                $response['status'] = true;
                $response['message'] =  'Successfully';
                $response['data'] =  $data;
            }else{
                $response['status'] = false;
                $response['message'] =  'No data found!';
            }
        }else{
            $response['status'] = false;
            $response['message'] =  'please enter user name!';
        }
        
        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        $input = $request->all();
        $search = isset($input['search']) && !empty($input['search']) ? $input['search']:false;
        //$usercode = isset($input['usercode']) && !empty($input['usercode']) ? $input['usercode']:false;
        $data = [];
        $user = User::where('user_code',$search)->first();

        if ($search && $user!=null) {
            $data['all_order'] = Order::where('user_id',$user->id)->where('vendor_id',Auth::id())->count();
            $data['pending_order'] = Order::where('user_id',$user->id)->where('vendor_id',Auth::id())->whereIn('order_status',[1,2,3,4,5])->latest()->count();
            $data['complt_order'] = Order::where('user_id',$user->id)->where('vendor_id',Auth::id())->where('order_status',7)->latest()->count();
            $data['payonacc_order'] = Order::onlyPayonAcc()->where('user_id',$user->id)->where('vendor_id',Auth::id())->latest()->count();
            
            $response = view('admin.customerdetail.view',compact('data','user'));
            
        }else{
            $response = redirect()->back()->withErrors("No user found!");
        }
        
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
