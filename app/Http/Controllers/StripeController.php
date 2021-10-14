<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transaction;
use Session;
use Stripe;
use DB;
use Auth;

class StripeController extends Controller
{
	/**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $this->validation($request);

        DB::beginTransaction();
        try {

            if ($request->radio_group=='stripe') {
                
                $this->onlinePost($request);
                
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $trans = Stripe\Charge::create ([
                        "amount" => $request->grand_total,
                        "currency" => "usd",
                        "source" => $request->stripeToken,
                        "description" => "This payment is tested purpose"
                ]);
                    
                if ($trans->status && $trans->status=='succeeded') 
                {
                    Transaction::where('user_id',Auth::id())
                        ->where('restaurant_id',$request->restaurant_id)
                        ->where('vendor_id',$request->vendor_id)
                        ->where('trans_status',1)->latest()
                        ->update(['transaction_id'=>$trans->id,'trans_status'=>2]);

                    Order::where('user_id',Auth::id())
                        ->where('restaurant_id',$request->restaurant_id)
                        ->where('vendor_id',$request->vendor_id)
                        ->where('payment_status',1)->latest()
                        ->update(['payment_status'=>2]);

                    Session::flash('success', 'Order placed successful! with paymeny of $'.$trans->amount.'');
                    DB::commit();   
                    return redirect()->route('webiste.order.history');
                }
                else
                {
                    DB::rollback();
                    return back()->withError('Order failed!');
                }

            }else{
                $this->codPost($request);

                Session::flash('success', 'Order placed successful! Your order total is $'.$request->grand_total.'');
                DB::commit();   
                return redirect()->route('webiste.order.history');

            }

        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
   
    }

    private function validation(Request $request)
    {
        if($request->delivery_type==2){
            $request->validate([
                'name' => ["required","min:2","max:255"],
                'email' => ["required"],
                'phone' => ["required"],
                'radio_group' => ["required"],
            ]);
        }
        else{
            $request->validate([
                'name' => ["required","min:2","max:255"],
                'email' => ["required"],
                'phone' => ["required"],
                'address' => ["required"],
                'country' => ["required"],
                'city' => ["required"],
                'state' => ["required"],
                'postalcode' => ["required"],
                'radio_group' => ["required"],
            ]);
        }

        return $this;
    }

    /**
     * success response method.Place order cash on delivery.
     *
     * @return \Illuminate\Http\Response
    */
    private function onlinePost($request)
    {
        $payMode = 2;
        $type = 2;
        $grandTotal = $request->grand_total;
        $this->createOrder($request,$payMode,$type,$grandTotal);

    }

    /**
     * success response method.Place order cash on delivery.
     *
     * @return \Illuminate\Http\Response
    */
    private function codPost($request)
    {
        $payMode = 1;
        $type = 1;
        $grandTotal = $request->grand_total;

        $this->createOrder($request,$payMode,$type,$grandTotal);

    }

    private function createOrder($request,$payMode,$type,$grandTotal)
    {
        if ($request->delivery_type==1) {
            $address = $request->name.', '.$request->address.', '.$request->city.', '.$request->state.', '.$request->country.', '.$request->postalcode;
        }
        else{
            $address = $request->name.', '.$request->address.', '.$request->phone;
        }
        
        $order_number =  date('ymd').rand(100000,9999999);

        $data = new Order;
        $data->order_number = $order_number;
        $data->user_id = Auth::id();
        $data->restaurant_id = $request->restaurant_id;
        $data->vendor_id = $request->vendor_id;
        $data->token = $request->_token;
        $data->sub_total = $request->sub_total;
        $data->tax = $request->tax;
        $data->shiping = $request->shiping;
        $data->total = $request->total;
        $data->grand_total = $grandTotal;
        $data->address = $address;
        $data->mobile = $request->phone;
        $data->email = $request->email;
        $data->note = $request->notes;
        $data->delivery_type = $request->delivery_type;
        $data->order_status = 1;
        $data->save();
        $orderId = $data->id;
        $this->createOrderDet($request,$orderId);
        $this->createTransaction($request,$orderId,$payMode,$type,$grandTotal);

        return $this;
    }

    private function createOrderDet($request,$orderId)
    {
        $data = [];
        $count = count($request->items);
        for ($i=0; $i < $count; $i++) { 
            $data[$i]['order_id'] = $orderId;
            $data[$i]['item_id'] = $request->items[$i]['id'];
            $data[$i]['price'] = $request->items[$i]['price'];
            $data[$i]['unit'] = $request->items[$i]['unit'];
            $data[$i]['quantity'] = $request->items[$i]['quantity'];
            $data[$i]['created_at'] = date("Y-m-d H:i:s");
        }
        OrderDetail::insert($data);

        return $this;
    }

    private function createTransaction($request,$orderId,$payMode,$type,$grandTotal)
    {
        $data = new Transaction;
        $data->order_id = $orderId;
        $data->transaction_id = null;
        $data->user_id = Auth::id();
        $data->restaurant_id = $request->restaurant_id;
        $data->vendor_id = $request->vendor_id;
        $data->pay_mode = $payMode;
        $data->type = $type;
        $data->grand_total = $grandTotal;
        $data->trans_status =1;
        $data->save();  

        return $this; 
    }    

}