<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Location;
use App\Models\Price;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;
use Carbon\Carbon;
use App\Models\Admin;
class UserController extends Controller
{
    public $successStatus = 200;
 /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyLaravelApp')-> accessToken; 
            $success['userId'] = $user->id;
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
 
 /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
     
     public function pwa_user()
     {
         
            $customers= DB::table('locations')
            ->rightJoin('pwa_registration', 'pwa_registration.pwa_choice', '=', 'locations.id')
            ->orderBy('time', 'desc')
             ->get();
            //print_r($customers);
        //   $customers=  Admin::leftJoin('Location', function($join) {
        //           $join->on('pwa_registration.pwa_choice', '=', 'locations.id');
        //         })->get();
            
            //dd($customers);
                 //  echo "ddddddddddd";
        // die();
         
        
          //$customers = Admin::orderBy('created_at', 'DESC')->get();
          $new_array=[];
          foreach($customers as $k=>$v)
          {
             // print_r($v);
             
              $date_time=Carbon::createFromFormat('Y-m-d H:i:s', $v->created_at);
              $obj=new \stdClass();
              $obj->id=$v->id;
              $obj->pwa_name=$v->pwa_name;
              $obj->pwa_email=$v->pwa_email;
              $obj->pwa_mobile=$v->pwa_mobile;
              $obj->pwa_add1=$v->pwa_add1;
              $obj->pwa_add2=$v->pwa_add2;
              $obj->pwa_state=$v->pwa_state;
              $obj->pwa_zip=$v->pwa_zip;
              $obj->pwa_status=$v->pwa_status;
              $obj->energy_plan=$v->energy_plan;
              $obj->energy_price=$v->energy_price;
              $obj->created_at=$v->created_at;
              $obj->pwa_choice=$v->location;
              $obj->time=$date_time->toTimestring();
              $obj->pwa_date=$date_time->toDatestring();
              array_push($new_array,$obj);
              $customers=$new_array;
                
                
          }
          $data = compact('customers');
        
        return json_encode($data);         
          
      }
      
       public function registered()
     {
        
         
           $customers= DB::table('locations')
            ->rightJoin('pwa_registration', 'pwa_registration.pwa_choice', '=', 'locations.id')
            ->where('pwa_status', '0')
            

       
                     ->get();
           $new_array=[];
          foreach($customers as $k=>$v)
          {
              
              $date_time=Carbon::createFromFormat('Y-m-d H:i:s', $v->created_at);
              $obj=new \stdClass();
              $obj->id=$v->id;
              $obj->pwa_name=$v->pwa_name;
              $obj->pwa_email=$v->pwa_email;
              $obj->pwa_mobile=$v->pwa_mobile;
              $obj->pwa_add1=$v->pwa_add1;
              $obj->pwa_add2=$v->pwa_add2;
              $obj->pwa_state=$v->pwa_state;
              $obj->pwa_zip=$v->pwa_zip;
              $obj->pwa_status=$v->pwa_status;
              $obj->energy_plan=$v->energy_plan;
              $obj->energy_price=$v->energy_price;
              $obj->pwa_choice=$v->location;
              $obj->time=$date_time->toTimestring();
              $obj->pwa_date=$date_time->toDatestring();
             
              array_push($new_array,$obj);
              $customers=$new_array;
                
                
          }
           $data = compact('customers');
        
        return json_encode($data);         
          
      }
      
      public function active()
     {
        
         
         
          $customers= DB::table('locations')
            ->rightJoin('pwa_registration', 'pwa_registration.pwa_choice', '=', 'locations.id')
           ->where('pwa_status', '1')
       
                     ->get();
           $new_array=[];
          foreach($customers as $k=>$v)
          {
              
              $date_time=Carbon::createFromFormat('Y-m-d H:i:s', $v->created_at);
              $obj=new \stdClass();
              $obj->id=$v->id;
              $obj->pwa_name=$v->pwa_name;
              $obj->pwa_email=$v->pwa_email;
              $obj->pwa_mobile=$v->pwa_mobile;
              $obj->pwa_add1=$v->pwa_add1;
              $obj->pwa_add2=$v->pwa_add2;
              $obj->pwa_state=$v->pwa_state;
              $obj->pwa_zip=$v->pwa_zip;
              $obj->pwa_status=$v->pwa_status;
              $obj->energy_plan=$v->energy_plan;
              $obj->energy_price=$v->energy_price;
              $obj->pwa_choice=$v->location;
              $obj->time=$date_time->toTimestring();
              $obj->pwa_date=$date_time->toDatestring();
             
              array_push($new_array,$obj);
              $customers=$new_array;
                
                
          }
           $data = compact('customers');
        
        return json_encode($data);         
          
      }
      
       public function nonactive()
     {
        
         
          
          $customers= DB::table('locations')
            ->rightJoin('pwa_registration', 'pwa_registration.pwa_choice', '=', 'locations.id')
           ->where('pwa_status', '2')
             
       
                     ->get();
           $new_array=[];
          foreach($customers as $k=>$v)
          {
              
              $date_time=Carbon::createFromFormat('Y-m-d H:i:s', $v->created_at);
              $obj=new \stdClass();
              $obj->id=$v->id;
              $obj->pwa_name=$v->pwa_name;
              $obj->pwa_email=$v->pwa_email;
              $obj->pwa_mobile=$v->pwa_mobile;
              $obj->pwa_add1=$v->pwa_add1;
              $obj->pwa_add2=$v->pwa_add2;
              $obj->pwa_state=$v->pwa_state;
              $obj->pwa_zip=$v->pwa_zip;
              $obj->pwa_status=$v->pwa_status;
              $obj->energy_plan=$v->energy_plan;
              $obj->energy_price=$v->energy_price;
              $obj->pwa_choice=$v->location;
              $obj->time=$date_time->toTimestring();
              $obj->pwa_date=$date_time->toDatestring();
             
              array_push($new_array,$obj);
              $customers=$new_array;
                
                
          }
           $data = compact('customers');
        
        return json_encode($data);         
          
     }
      public function suspended()
     {
        
         
           $customers= DB::table('locations')
            ->rightJoin('pwa_registration', 'pwa_registration.pwa_choice', '=', 'locations.id')
             ->where('pwa_status', '3')
            //  ->whereNull('energy_plan')
           
       
       
                     ->get();
           $new_array=[];
          foreach($customers as $k=>$v)
          {
              
              $date_time=Carbon::createFromFormat('Y-m-d H:i:s', $v->created_at);
              $obj=new \stdClass();
              $obj->id=$v->id;
              $obj->pwa_name=$v->pwa_name;
              $obj->pwa_email=$v->pwa_email;
              $obj->pwa_mobile=$v->pwa_mobile;
              $obj->pwa_add1=$v->pwa_add1;
              $obj->pwa_add2=$v->pwa_add2;
              $obj->pwa_state=$v->pwa_state;
              $obj->pwa_zip=$v->pwa_zip;
              $obj->pwa_status=$v->pwa_status;
              $obj->energy_plan=$v->energy_plan;
              $obj->energy_price=$v->energy_price;
              $obj->pwa_choice=$v->location;
              $obj->time=$date_time->toTimestring();
              $obj->pwa_date=$date_time->toDatestring();
             
              array_push($new_array,$obj);
              $customers=$new_array;
                
                
          }
           $data = compact('customers');
        
        return json_encode($data);         
          
      }
      public function unsuspendupdate(Request $req ,$id)
     
    {
        $customer=Admin::find($id);
        $customer->pwa_status=$req->pwa_status;
         $result=$customer->update();

         if($result)
         {
           return response()->json(['success' => 'Your id is remove from suspended']);  
         }
          else
             return response()->json(['failed' => 'Your id is exist']);
    }
     
       
      
      public function admin()
      {
          
           $customers = User::all();
           $new_array=[];
           foreach($customers as $k=>$v)
           {
               
               $date_time=Carbon::createFromFormat('Y-m-d H:i:s', $v->created_at);
               $obj=new \stdClass();
               $obj->id=$v->id;
               $obj->name=$v->name;
               $obj->email=$v->email;
               $obj->time=$date_time->toTimestring();
               $obj->pwa_date=$date_time->toDatestring();
              
               array_push($new_array,$obj);
               $customers=$new_array;
                 
                 
           }
          $data = compact('customers');
        
        return json_encode($data);         
          
      }
        public function delete($id)
          {
            $customer=Admin::find($id);
            if(!is_null($customer))
            {
                $customer->delete();
                 return response()->json(['success' => 'Your id is deleted']);
            }
            else
             return response()->json(['failed' => 'Your id is exist']);
          }
           public function admindelete($id)
          {
            $customer=User::find($id);
            if(!is_null($customer))
            {
                $customer->delete();
                 return response()->json(['success' => 'Your id is deleted']);
            }
            else
             return response()->json(['failed' => 'Your id is exist']);
          }
          
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' =>  'required|min:6',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) { 
             return response()->json(['error'=>$validator->errors()], 401);            
 }
 $input = $request->all(); 
        $input['password']=bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('MyLaravelApp')-> accessToken; 
        $success['name'] =  $user->name;
 return response()->json(['success'=>$success,'message'=>'Your user has been registered.'], $this-> successStatus); 
    }
 
 /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function userDetails() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    }
    public function search(Request  $s)
    {
      
      
      
          $customers= DB::table('locations')
         ->rightJoin('pwa_registration', 'pwa_registration.pwa_choice', '=', 'locations.id')
         ->where('pwa_name', 'Like', '%' . $s->s . '%')
         ->orWhere('pwa_email', 'Like', '%' . $s->s . '%')
         ->orWhere('pwa_mobile', 'Like', '%' . $s->s . '%')
         ->orWhere('location', 'Like', '%' . $s->s . '%')
         ->orWhere('pwa_add1', 'Like', '%' . $s->s . '%')
         ->orWhere('pwa_add2', 'Like', '%' . $s->s . '%')
         ->orWhere('pwa_state', 'Like', '%' . $s->s . '%')
         ->orWhere('energy_plan', 'Like', '%' . $s->s . '%')
         ->orWhere('pwa_zip', 'Like', '%' . $s->s . '%')
         ->orWhere('energy_price', 'Like', '%' . $s->s . '%')
         
    
         
         
         ->get();
           $new_array=[];
          foreach($customers as $k=>$v)
          {
              
              $date_time=Carbon::createFromFormat('Y-m-d H:i:s', $v->created_at);
              $obj=new \stdClass();
              $obj->id=$v->id;
              $obj->pwa_name=$v->pwa_name;
              $obj->pwa_email=$v->pwa_email;
              $obj->pwa_mobile=$v->pwa_mobile;
              $obj->pwa_add1=$v->pwa_add1;
              $obj->pwa_add2=$v->pwa_add2;
              $obj->pwa_state=$v->pwa_state;
              $obj->pwa_zip=$v->pwa_zip;
              $obj->energy_plan=$v->energy_plan;
              $obj->energy_price=$v->energy_price;
              $obj->pwa_choice=$v->location;
              $obj->pwa_status=$v->pwa-status;
              $obj->time=$date_time->toTimestring();
              $obj->pwa_date=$date_time->toDatestring();
            
              array_push($new_array,$obj);
              $customers=$new_array;
                
                
          } 
          
        return json_encode($new_array);         
      
     
        //  return Admin::where('pwa_name', 'Like', '%' . $s->s . '%')->orWhere('pwa_email', 'Like', '%' . $s->s . '%')->orWhere('pwa_mobile', 'Like', '%' . $s->s . '%')
        //  ->orWhere('pwa_choice', 'Like', '%' . $s->s . '%')
        //  ->orWhere('pwa_add1', 'Like', '%' . $s->s . '%')
        //  ->orWhere('pwa_add2', 'Like', '%' . $s->s . '%')
        //  ->orWhere('pwa_state', 'Like', '%' . $s->s . '%')
        //  ->orWhere('energy_plan', 'Like', '%' . $s->s . '%')
        //  ->orWhere('pwa_zip', 'Like', '%' . $s->s . '%')
        //  ->orWhere('energy_price', 'Like', '%' . $s->s . '%')
         
    
         
         
        //  ->get();
         
          return json_encode($installation);
        //   $new_array=[];
          
        //   foreach($customers as $k=>$v)
        //   {
              
        //       $date_time=Carbon::createFromFormat('Y-m-d H:i:s', $v->created_at);
        //     //   $date_time1=Carbon::createFromFormat('H:i:s', $v->created_at);
               
        // //           echo $data_time->toDatestring();
        // //          echo "gshghg";
        // //   die();
        //       $obj=new \stdClass();
        //       $obj->id=$v->id;
        //       $obj->pwa_name=$v->pwa_name;
        //       $obj->pwa_email=$v->pwa_email;
        //       $obj->pwa_mobile=$v->pwa_mobile;
        //       $obj->pwa_add1=$v->pwa_add1;
        //       $obj->pwa_add2=$v->pwa_add2;
        //       $obj->pwa_state=$v->pwa_state;
        //       $obj->pwa_zip=$v->pwa_zip;
        //       $obj->energy_plan=$v->energy_plan;
        //       $obj->energy_price=$v->energy_price;
        //       $obj->pwa_choice=$v->pwa_choice;
        //       $obj->time=$date_time1->toTimestring();
        //       $obj->pwa_date=$date_time->toDatestring();
             
        //       array_push($new_array,$obj);
        //       $customers=$new_array;
                
                
        //   }
        //   $data = compact('customers');
        
        // return json_encode($data);  
          
          
       
    }
    public $search = '';
    
    public function filter(Request $request)
    {
        
        
  
        $obj = json_decode(file_get_contents('php://input'));   
        $request=$obj;
        $pwa_choice=isset($request->pwa_choice) ? $request->pwa_choice : null;
        $energy_plan=isset($request->energy_plan) ? $request->energy_plan : null;
        $energy_price=isset($request->energy_price) ? $request->energy_price : null;
      
     $key=isset($request->key) ? $request->key : null;
     
      
        $customers= DB::table('locations')
        ->rightJoin('pwa_registration', 'pwa_registration.pwa_choice', '=', 'locations.id')
        ->orderBy('pwa_date', 'desc')
             ->when($pwa_choice, function($query,$pwa_choice)
            {
             return $query->where('location', '=', $pwa_choice);
            })
            
             ->when($energy_plan, function($query, $energy_plan)
            {
             return $query->where( 'energy_plan', '=',  $energy_plan);
            })
            
             ->when($energy_price, function($query, $energy_price)
            {
             return $query->where( 'energy_price', '=',  $energy_price*100);
            })
            
              ->when($key, function($query, $key)
               {
                   
                   return $query->Where(function($query)  use ($key) {
                       
                        $query->orWhere('pwa_name', 'Like', '%' . $key . '%')
                         ->orWhere('pwa_email', 'Like', '%' . $key . '%')
                         ->orWhere('pwa_mobile', 'Like', '%' . $key . '%')
                         ->orWhere('location', 'Like', '%' . $key . '%')
                         ->orWhere('pwa_add1', 'Like', '%' . $key . '%')
                         ->orWhere('pwa_add2', 'Like', '%' . $key . '%')
                         ->orWhere('pwa_state', 'Like', '%' . $key . '%')
                         ->orWhere('energy_plan', 'Like', '%' . $key . '%')
                         ->orWhere('pwa_zip', 'Like', '%' . $key . '%')
                         ->orWhere('energy_price', 'Like', '%' . $key . '%');
         
                          
                       
                   });
                      

               })
   
  ->get();
  
//   $key="chetan";
  
//   $customers =  DB::table('locations')
//         ->rightJoin('pwa_registration', 'pwa_registration.pwa_choice', '=', 'locations.id')->where('location', '=', $pwa_choice)->orWhere(function($query)  use ($key) {
//                 $query->where('pwa_name','Like','%'.$key.'%')
//                     ->orWhere('pwa_email','Like','%'.$key.'%');
// })->get();
  
  
   $new_array=[];
          foreach($customers as $k=>$v)
          {
              
              $date_time=Carbon::createFromFormat('Y-m-d H:i:s', $v->created_at);
              $obj=new \stdClass();
              $obj->id=$v->id;
              $obj->pwa_name=$v->pwa_name;
              $obj->pwa_email=$v->pwa_email;
              $obj->pwa_mobile=$v->pwa_mobile;
              $obj->pwa_add1=$v->pwa_add1;
              $obj->pwa_add2=$v->pwa_add2;
              $obj->pwa_state=$v->pwa_state;
              $obj->pwa_zip=$v->pwa_zip;
              $obj->energy_plan=$v->energy_plan;
              $obj->energy_price=$v->energy_price;
              $obj->pwa_choice=$v->location;
              $obj->pwa_status=$v->pwa_status;
              $obj->time=$date_time->toTimestring();
              $obj->pwa_date=$date_time->toDatestring();
            
              array_push($new_array,$obj);
              $customers=$new_array;
                
                
          }
          
        return json_encode($new_array);   
    //  return json_encode($customers);

    }
    
    public function update(Request $req,$id)
    {
         $customer=User::find($id);
         $customer->name=$req->name;
         $customer->email=$req->email;
         $customer->password=bcrypt($req->password);
         $result=$customer->update();
         if($result)
         {
           return response()->json(['success' => 'Your id is updated']);  
         }
          else
             return response()->json(['failed' => 'Your id is exist']);
    }
    
     public function suspendupdate(Request $req ,$id)
    {
        $customer=Admin::find($id);
        $customer->pwa_status=$req->pwa_status;
         $result=$customer->update();

         if($result)
         {
           return response()->json(['success' => 'Your id is suspended']);  
         }
          else
             return response()->json(['failed' => 'Your id is exist']);
    }
    
    /**
     * location API
     */
    
    public function locationregister(Request $request)
    {
        
       
        
        $current_user  = Location::where('location', $request->location)->first('id');
         if(isset($current_user)&&$current_user->id!='')
          {
               return response()->json(['error'=>1,'message'=>'Your Location is all ready exist'], $this-> successStatus); 
          }
    
        $request->validate([
            'location'=>"required",
            'ZIP_code'=>'required',
            'state'=>'required',
            'salesTax'=>'required',
            ]);
            $new=new location();
        $new->location=$request->location;
        $new->ZIP_code=$request->ZIP_code;
        $new->state=$request->state;
        $new->salesTax=$request->salesTax;
        $new->save();
        return response()->json(['success'=>$new,'message'=>'Your New location has been registered.'], $this-> successStatus); 
     }
     
      public function location()
      {
          
           $customers = Location::all();
           $new_array=[];
           foreach($customers as $k=>$v)
           {
               
               $date_time=Carbon::createFromFormat('Y-m-d H:i:s', $v->created_at);
               $obj=new \stdClass();
               $obj->id=$v->id;
               $obj->location=$v->location;
               $obj->ZIP_code=$v->ZIP_code;
               $obj->state=$v->state;
               $obj->salesTax=$v->salesTax;
               $obj->time=$date_time->toTimestring();
               $obj->pwa_date=$date_time->toDatestring();
              
               array_push($new_array,$obj);
               $customers=$new_array;
                 
                 
           }
          $data = compact('customers');
        
        return json_encode($data);         
          
      }
      
       public function locationdelete($id)
          {
            $customer=Location::find($id);
            if(!is_null($customer))
            {
                $customer->delete();
                 return response()->json(['success' => 'Your id is deleted']);
            }
            else
             return response()->json(['failed' => 'Your id is exist']);
          }
          
       public function locationupdate(Request $req,$id)
       
    {
        
             $current_location  = Location::where('location', $req->location)->first('id');
         if(isset($current_user)&&$current_user->id!='')
          {
              return response()->json(['error'=>1,'message'=>'Your Location is all ready exist'], $this-> successStatus); 
          }
    
         $customer=Location::find($id);
         $customer->location=$req->location;
         $customer->ZIP_code=$req->ZIP_code;
         $customer->state=$req->state;
          $customer->salesTax=$req->salesTax;
         $result=$customer->update();
         if($result)
         {
           return response()->json(['success' => 'Your id is updated']);  
         }
          else
             return response()->json(['failed' => 'Your id is exist']);
    }
    
    
    /**
     Price management API
     */
     
     public function price(Request $request)
    {
        $request->validate([
            'location'=>'required',
            'package_name'=>'required',
            'kwh'=>'required',
            'mi_eq'=>'required',
            'dollar_mi'=>'required',
            'total_price'=>'required',
            'salesTax'=>'required',
            'totalSalexTax'=>'required'
            ]);
            $new=new price();
        $new->location_id=$request->location_id;   
        $new->location=$request->location;
        $new->package_name=$request->package_name;
        $new->kwh=$request->kwh;
        $new->mi_eq=$request->mi_eq;
        $new->dollar_mi=$request->dollar_mi;
        $new->total_price=$request->total_price;
        $new->salesTax=$request->salesTax;
         $new->totalSalexTax=$request->totalSalexTax;
        $new->save();
        return response()->json(['success'=>$new,'message'=>'Your New package has been registered.'], $this-> successStatus); 
     }
     
      public function pricedetails(Request $request)
      {
          if($request->location=='null'||$request->location=='')
          {
              
               $locations=  DB::table('prices')
                    ->join('locations', 'prices.location_id', '=', 'locations.id')
                     ->select('locations.location','locations.id')->groupBy('locations.id')->get(); 
                 
                   $main_data=array();
                    $new_array=[];
                foreach($locations as $index=>$location) 
                { 
                
                
                  $customers= DB::table('prices')
            ->join('locations', 'prices.location_id', '=', 'locations.id')
            ->select('prices.id','locations.location','package_name','kwh','mi_eq','dollar_mi','total_price','locations.salesTax','totalSalexTax')
            ->where( 'prices.location_id',$location->id)
            ->get();
                   
                   
                   foreach($customers as $customer)
                    {
                      $new_array[$location->location][]=array('id'=>$customer->id,'package_name'=> $customer->package_name,
                                                              'kwh'=> $customer->kwh,'mi_eq'=> $customer->mi_eq,'dollar_mi'=> $customer->dollar_mi,'total_price'=> $customer->total_price,'salesTax'=> $customer->salesTax,'totalSalexTax'=> $customer->totalSalexTax);
                        
                    }
                  //  array_push($new_array);
                    
                    
                } 
                
                 // $a=array('name'=>'rrrrrrrr');
           
           
           
        return json_encode( $new_array);     
            
            
          }
         
           else
           {
            
         $locations=  DB::table('prices')
                    ->join('locations', 'prices.location_id', '=', 'locations.id')
                     ->select('locations.location','locations.id')->groupBy('locations.id')
                      ->where( 'prices.location_id',$request->location)
                     ->get(); 
                 
                   $main_data=array();
                    $new_array=[];
                foreach($locations as $index=>$location) 
                { 
                
                
                  $customers= DB::table('prices')
            ->join('locations', 'prices.location_id', '=', 'locations.id')
            ->select('prices.id','locations.location','package_name','kwh','mi_eq','dollar_mi','total_price','locations.salesTax','totalSalexTax')
            ->where( 'prices.location_id',$request->location)
            ->get();
                   
                   
                   foreach($customers as $customer)
                    {
                      $new_array[$location->location][]=array('id'=>$customer->id,'package_name'=> $customer->package_name,
                                                              'kwh'=> $customer->kwh,'mi_eq'=> $customer->mi_eq,'dollar_mi'=> $customer->dollar_mi,'total_price'=> $customer->total_price,'salesTax'=> $customer->salesTax,'totalSalexTax'=> $customer->totalSalexTax);
                        
                    }
                  //  array_push($new_array);
                    
                    
                } 
                
                 // $a=array('name'=>'rrrrrrrr');
           
           
           
        return json_encode( $new_array);     
            
           
            
               
           }
         
          
        //   $new_array=[];
        //   foreach($customers as $k=>$v)
        //   {
               
        //     //   $date_time=Carbon::createFromFormat('Y-m-d H:i:s', $v->created_at);
        //       $obj=new \stdClass();
        //       $obj->id=$v->id;
        //       $obj->location=$v->location;
        //       $obj->package_name=$v->package_name;
        //       $obj->kwh=$v->kwh;
        //       $obj->mi_eq=$v->mi_eq;
        //       $obj->dollar_mi=$v->dollar_mi;
        //       $obj->total_price=$v->total_price;
        //       $obj->salesTax=$v->salesTax;
        //       $obj->totalSalexTax=$v->totalSalexTax;
        //     //   $obj->time=$date_time->toTimestring();
        //     //   $obj->pwa_date=$date_time->toDatestring();
              
        //       array_push($new_array,$obj);
        //       $customers=$new_array;
                 
                 
        //   }
          
         
        
        // return json_encode($customers);         
          
      }
      
     public function locationdetails()
    {
       return Price::all()->groupBy('location');
        // ->get();
       
        // return json_encode($customers); 
        
        // foreach($customers as $timezone => $userList) {
           
        //         foreach($userList as $customers) {

        // }
        
        // }
        
    }
      
       public function pricedelete($id)
          {
            $customer=Price::find($id);
            if(!is_null($customer))
            {
                $customer->delete();
                 return response()->json(['success' => 'Your id is deleted']);
            }
            else
             return response()->json(['failed' => 'Your id is not exist']);
          }
          
           public function priceupdate(Request $req,$id)
       
    {
        
         $customer=Price::find($id);
        
         $customer->package_name=$req->package_name;
         $customer->kwh=$req->kwh;
         $customer->mi_eq=$req->mi_eq;
         $customer->total_price=$req->total_price;
          $customer->dollar_mi=$req->dollar_mi;
           $customer->salesTax=$req->salesTax;
           $customer->totalSalexTax=$req->totalSalexTax;
          
         $result=$customer->update();
         if($result)
         {
           return response()->json(['success' => 'Your id is updated']);  
         }
          else
             return response()->json(['failed' => 'Your id is exist']);
    }
    
      public function plan(Request $request)
    {
        $request->validate([
            'package_plan'=>'required'
            
            ]);
            $new=new plan();
        $new->package_plan=$request->package_plan;   
        
        $new->save();
        return response()->json(['success'=>$new,'message'=>'Your New package has been registered.'], $this-> successStatus); 
     }
     
      public function plan_package()
    {
       $customers = Plan::all();
        return json_encode($customers); 
     }
    
     public function planpackage($id)
          {
            $customer=Plan::find($id);
            if(!is_null($customer))
            {
                $customer->delete();
                 return response()->json(['success' => 'Your id is deleted']);
            }
            else
             return response()->json(['failed' => 'Your id is exist']);
          }
    
    

}
