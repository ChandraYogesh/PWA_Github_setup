<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


 Route::post('login', [UserController::class, 'login']); 
 Route::post('register', [UserController::class, 'register']); 
 Route::group(['middleware' => 'auth:api'], function(){ Route::post('user-details', [UserController::class, 'userDetails']);
 

     
 });
    Route::get('pwa_user', [UserController::class, 'pwa_user']);
     Route::get('registered', [UserController::class, 'registered']);
      Route::get('active', [UserController::class, 'active']);
       Route::get('nonactive', [UserController::class, 'nonactive']);
        Route::get('suspended', [UserController::class, 'suspended']);
         Route::put('suspend/{user}',[UserController::class,'suspendupdate']);
          Route::put('suspend/{user}',[UserController::class,'suspendupdate']);
          Route::put('unsuspend/{user}',[UserController::class,'unsuspendupdate']);
    Route::get('admin',[UserController::class,'admin']);
    Route::get('edit/{user}',[UserController::class,'edit']);
    Route::put('update/{user}',[UserController::class,'update']);
   Route::delete('pwa_user/{user}', [UserController::class, 'delete']); 
    Route::delete('delete/{user}', [UserController::class, 'admindelete']);
    Route::post('locationregister', [UserController::class, 'locationregister']);
   Route::get('location', [UserController::class, 'location']);
   Route::delete('location/{user}', [UserController::class, 'locationdelete']);
   Route::put('locationupdate/{user}', [UserController::class, 'locationupdate']);
   Route::post('price', [UserController::class, 'price']);
   Route::get('pricedetails', [UserController::class, 'pricedetails']);
    Route::delete('price/{user}', [UserController::class, 'pricedelete']);
    Route::put('priceupdate/{user}', [UserController::class, 'priceupdate']);
     Route::post('plan', [UserController::class, 'plan']);
     Route::get('plan_package', [UserController::class, 'plan_package']);
      Route::delete('planpackage/{user}', [UserController::class, 'planpackage']);
      Route::get('locationdetails', [UserController::class, 'locationdetails']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/search/{name?}",[UserController::class, 'search']);
Route::get("filter",[UserController::class, 'filter']);

Route::post("filter1",[UserController::class, 'filter']);
Route::get("filter2",[UserController::class, 'filterlocation']);

