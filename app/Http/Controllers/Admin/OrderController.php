<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\OrderStatusNotification;
use App\Models\DeliveryBoyLocation;
use App\Models\DeliveryBoyHistory;
use App\Models\User;
use App\Models\Order;
use DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    private $data;
    public function __construct(Order $data)
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
        $data = $this->data->filterOrder()->latest()->get();
        return view('admin.orders.index',compact('data'));
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

    public function paymentStatus(Request $request)
    {
        $status = $request->payment_status;
        $cid = $request->order_id;
        $response = [];

        if(empty($cid) || empty($status)){
            $response['status'] = false;
        }else{
            $data = Order::where('id',$cid)->first();
            $data->payment_status = $status;
            if ($data->update()) {
                $response['status'] = true;
                $response['message'] = "Status Successfully changed";
            }else{
                $response['status'] = false;
            }
        }
        return response()->json($response);
    }

    public function orderStatus(Request $request)
    {
        $status = $request->order_status;
        $cid = $request->order_id;
        $response = [];

        if(empty($cid) || empty($status)){
            $response['status'] = false;
        }
        else
        {
            
            $data = Order::where('id',$cid)->first();
            $data->order_status = $status;
            
            if ($status==7) 
            {
                $dbl = DeliveryBoyLocation::where('user_id',$data->delivery_user_id)->first();
                $dbl->is_busy = 0;
                $dbl->total_delivery = $dbl->total_delivery+1;
                $dbl->update();
                $data->payment_status = 2;
            }
            
            if ($data->update()) {

                $this->sendNotification($data);

                $response['status'] = true;
                $response['message'] = "Status Successfully changed";

            }
            else
            {
                $response['status'] = false;
            }
        }
        return response()->json($response);
    }

    private function sendNotification($data,$deliver=false)
    {
        if ($deliver) {
            $firstLine = 'Your order is accepted by deliver boy, will reach soon';
            User::where('id',$data->user_id)->first()->notify(new OrderStatusNotification($firstLine));
        }
        else{

            if ($data->order_status==2) 
            {
                $firstLine = 'Your order is accepted by restaurant and prepare';
                User::where('id',$data->user_id)->first()->notify(new OrderStatusNotification($firstLine));
            }
            if ($data->order_status==4) 
            {
                $firstLine = 'Your order is on the way our delivery partner will reach you soon.';
                User::where('id',$data->user_id)->first()->notify(new OrderStatusNotification($firstLine));
            }
            if ($data->order_status==7) 
            {
                $nowTimeDate = Carbon::now();
                $delay = Carbon::now()->addMinutes(1);
                $firstLine = 'Your order is completed thank you.';
                User::where('id',$data->user_id)->first()->notify((new OrderStatusNotification($firstLine))->delay($delay));
                User::where('id',$data->vendor_id)->first()->notify((new OrderStatusNotification($firstLine))->delay($delay));
            }
        }

        return $this;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newOrder()
    {
        $data = $this->data->filterNewOrder()->latest()->get();
        return view('admin.orders.new',compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function completedOrder()
    {
        $data = $this->data->filterCompletedOrder()->latest()->get();
        return view('admin.orders.completed',compact('data'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function deliveryBoyOrderHistory()
    {
        $data = DeliveryBoyHistory::filter()->latest()->get();
        return view('admin.orders.deliveryBoyHistory',compact('data'));
    }


    /**
     * change of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function deliveryBoyStatus(Request $request)
    {
        $cid = $request->user_id;
        $response = [];

        if(empty($cid)){
            $response['status'] = false;
        }else{
            $data = DeliveryBoyLocation::where('user_id',$cid)->first();
            $data->status = $data->status==1?0:1;
            if ($data->update()) {
                $response['status'] = true;
                $response['message'] = "Status Successfully changed";
            }else{
                $response['status'] = false;
            }
        }
        return response()->json($response);
    }


    /**
     * change of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function deliveryBoyOrderAccept(Request $request)
    {
        $cid = $request->user_id;
        $oid = $request->order_id;
        $response = [];
        $update = false;
        if(empty($cid) || empty($oid)){
            $response['status'] = false;
        }else{
            DB::beginTransaction();
            $data = Order::where('id',$oid)->first();
            $data->delivery_user_id = $cid;
            if ($data->update()) {
                if(DeliveryBoyLocation::where('user_id',$cid)->update(['is_busy'=>1])){
                    $update = true;
                    DeliveryBoyHistory::create(['user_id'=>$cid,'order_id'=>$oid]);
                }else{
                    $update = false;
                }
            }
            if ($update) {
                $deliver = true;
                $this->sendNotification($data,$deliver);           
                DB::commit();
                $response['status'] = true;
                $response['message'] = "Status Successfully changed";
            }else{
                DB::rollback();
                $response['status'] = false;
            }
        }
        return response()->json($response);
    }


    public function detailsOrder(Order $id)
    {
        $data = $id;
        return view('admin.orders.details',compact('data'));
    }
}
