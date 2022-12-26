<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sdm\MasterKotaController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\sdm\DataMasterKotaController;
use App\Http\Controllers\auth\RegisterControllers;
use App\Http\Controllers\auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
route::view('/try','loginn');
route::view('/authT','/layouts/auth/main');


    


Route::middleware(['sdm'])->group(function(){
    Route::resource('SDM', MasterKotaController::class);
    Route::resource(('masterKota'),DataMasterKotaController::class);
    // Route::resource(('saveReport'),saveReportController::class);
});

Route::middleware(['auth'])->group(function(){

    Route::resource(('home'),HomeController::class);

});

Route::resource(('registration'),RegisterControllers::class)->middleware('guest');
Route::post(('/signIn'),[LoginController::class,'authenticate']);
Route::post(('/signout'),[LoginController::class,'logout']);
Route::get(('/'),[LoginController::class,'index'])->middleware('guest');





