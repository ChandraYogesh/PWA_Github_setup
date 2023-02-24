<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\CronController;
 Route::post('login', [UserController::class, 'login']); 
  Route::get('croncheck', [CronController::class, 'index']); 
Route::get('/', function () {
    return view('welcome');
});
Route::get("filter1",[UserController::class, 'filter']);
