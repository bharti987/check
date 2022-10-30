<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\usercontroller;


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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');  
})->middleware(['auth'])->name('dashboard');





require __DIR__.'/auth.php';



//ADMIN

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

  Route::namespace('Auth')->middleware('guest:admin')->group(function(){
     
     // login route
     
     Route::get("login","AuthenticatedSessionController@create")->name("login");
     Route::post("login","AuthenticatedSessionController@store")->name("adminlogin");


  });
   Route::middleware('admin')->group(function(){

        Route::get("dashboard","HomeController@index")->name("dashboard");

        Route::get("dashboard","HomeController@reg_fun")->name("dashboard");
        Route::post("dashboard","HomeController@save_admin_user")->name("dashboard");

   });

   Route::post("logout","Auth\AuthenticatedSessionController@destroy")->name("logout");


  Route::middleware('page1')->group(function(){
   Route::get("page-1","HomeController@page1")->name("page1");  //check my middleware 1,admin can view page-1 only if he/she is logged in, otherwise keep redirecting to admin login
});

   
});


Route::middleware('page2')->group(function(){
    Route::get("page-2","Admin\HomeController@page2")->name("page2");  //check my middleware 2,user can view page-2 only if he/she is logged in to dashboard,otherwise will get the msg 404 not found of handle()
});


  
