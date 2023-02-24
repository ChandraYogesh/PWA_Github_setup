<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;
class CronController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
     public function index()
         {
            // echo "Testing";
             
             $users=DB::select("SELECT t1.* FROM transaction t1 LEFT OUTER JOIN transaction t2 ON (t1.cust_email = t2.cust_email AND t1.created < t2.created) WHERE t2.cust_email IS NULL ");
            // dd($users);
             
        foreach($users as $user)
        {
            
            $message="dddddddddd";
            Log::info($message);
            
           // print_r($user);
            //die();
              $diff = now()->diffInDays(Carbon::parse($user->created));
              echo $user->cust_email."dd".$diff;
              echo "<br/>";
             if($diff==31)
             {
                 echo $user->cust_email;
             }
             elseif($diff>43)
             {
                 
                 echo $user->cust_email;
             }
             
             
             
             
        }    
             
             die();
         }
}
