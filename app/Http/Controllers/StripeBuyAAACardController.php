<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AaadiningPurchase;
use App\Models\User;
use App\Notifications\WelcomeAaadingMember;
use App\Mail\AaadiningMemberInvoiceMail;
use Session;
use Stripe;
use Auth;
use Settings;
use DB;
use Mail;

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

                    $this->welcmEmailNotification($add);
                    $this->invoceEmailNotification($add);

                    Session::flash('success', 'Payment successful!');
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

    public function welcmEmailNotification($data)
    {
        $firstLine = Settings::get('setting_email_notification_aaadining_member_wlcm_email');
        User::where('id',$data->user_id)->first()->notify(new WelcomeAaadingMember($firstLine));
        return $this;        
    }

    public function invoceEmailNotification($data)
    {
        $user = User::where('id',$data->user_id)->first();
        Mail::to($user->email)->send(new AaadiningMemberInvoiceMail($data));
        return $this;       
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
