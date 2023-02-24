<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use DB;
class StatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Users Status Update';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
              $message="check status";
            Log::info($message);
            
            
                
             $users=DB::select("SELECT t1.* FROM transaction t1 LEFT OUTER JOIN transaction t2 ON (t1.cust_email = t2.cust_email AND t1.created < t2.created) WHERE t2.cust_email IS NULL ");
            // dd($users);
             
        foreach($users as $user)
        {
            
           
            
           // print_r($user);
            //die();
              $diff = now()->diffInDays(Carbon::parse($user->created));
              
             if($diff==31)
             {
                    Log::info($user->cust_email."dd".$diff);
                
                       DB::table('pwa_registration')
                    ->where('pwa_email', $user->cust_email)  // find your user by their email
                    ->update(array('pwa_status' =>2,'energy_plan'=>NULL,'energy_price'=>NULL));  
                 }
             elseif($diff>43)
             {
                 
                        $message=$user->cust_email;
            Log::info($user->cust_email."dd".$diff);
                 
                   DB::table('pwa_registration')
                ->where('pwa_email', $user->cust_email)  // find your user by their email
                ->update(array('pwa_status' =>3,'energy_plan'=>NULL,'energy_price'=>NULL));  
             }
             
           
         
             
        }    
             
            
    }
}
