<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AaadiningPurchase;
use Session;
use Stripe;
use Auth;
use Settings;
use DB;

class StripeBuyAAACardController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('buyaaadiningcard.index');
    }

    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $this->validation();

        DB::beginTransaction();
        try {

                $pay = (int)Settings::get('general_setting_aaadining_club_charges');
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $trans = Stripe\Charge::create ([
                        "amount" => 100*$pay,
                        "currency" => "usd",
                        "source" => $request->stripeToken,
                        "description" => "This payment is tested purpose"
                ]);
                
                if ($trans->status && $trans->status=='succeeded') 
                {
                    $add = new AaadiningPurchase;
                    $add->user_id = Auth::id();
                    $add->transaction_id = $trans->id;
                    $add->price = $pay;
                    $add->purchase_at = date("Y-m-d H:i:s", $trans->created);
                    $add->end_at = date("Y-m-d H:i:s", strtotime("+12 month",$trans->created));
                    $add->status = 1;
                    $add->save();

                    Session::flash('success', 'Order placed successful! with paymeny of $'.$pay.'');
                    DB::commit();   
                    return redirect()->route('webiste.home.index');
                }
                else
                {
                    DB::rollback();
                    return back()->withError('Your purchase failed!');
                }

        } catch (Exception $e) {
            
            DB::rollback();

            return back()->withError($e->getMessage());
        }
   
    }

    public function validation()
    {
        if (Auth::check()) {
            return true;
        }else{
            return redirect()->back()->withError('Please sign-in/sign-up first to buy aaadining club card!');
        }
    }

}
