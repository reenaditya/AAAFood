<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\AaadiningPurchase;
use App\Notifications\MemberExpireNotification;
use App\Models\User;
use Settings;

class OneMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oneminute:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs every one minuts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Send mesg to Aaadining member whose end date within 1 month
        $now = date('Y-m-d H:i');
        $oneMExtend = date('Y-m-d H:i',strtotime("+1 months"));
        $getuser = AaadiningPurchase::where('status',1)->get();
        
        if (!$getuser->isEmpty()) 
        {
            foreach ($getuser as $key => $value) 
            {
                
                $oneMonthBefore = date("Y-m-d H:i",strtotime($value->end_at));
                
                if ($oneMExtend === $oneMonthBefore) 
                {
                    $firstLine = Settings::get('setting_email_notification_aaadining_member');
                    $url = url('/');
                    User::where('id',$value->user_id)->first()->notify(new MemberExpireNotification($firstLine,$url));
                }
            }
        }

        //If Membership expire deactivate it
        if (!$getuser->isEmpty()) 
        {
            foreach ($getuser as $key => $value) 
            {
                
                $oneMonthBefore = date("Y-m-d H:i",strtotime($value->end_at));
                
                if ($now >= $oneMonthBefore) 
                {
                    AaadiningPurchase::where('id',$value->id)->where('status',1)->update(['status'=>0]);
                    $firstLine = Settings::get('setting_email_notification_aaadining_member_on_expire');
                    $url = url('/');
                    User::where('id',$value->user_id)->first()->notify(new MemberExpireNotification($firstLine,$url));
                }
            }
        }

    }
}
