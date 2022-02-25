<?php

use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\UserController;
use App\Models\Dashboard;

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
    return view('home');
});


// Route::get('/{lang}', function ($lang ='vi') {
//     App::setlocale($lang);
//     return view('home');
// });


Route::get('/expectedPrice',function(){
    return view('expectedPrice');
});

// Route::get('/viewinfo',[DashboardController::class,'index']);


Auth::routes();


Route::prefix('user')->name('user.')->group(function(){
    
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.user.login')->name('login'); 
        Route::view('/register','dashboard.user.register')->name('register');
        Route::post('/create',[UserController::class,'create'])->name('create');
        Route::post('/authenticate',[UserController::class,'authenticate'])->name('authenticate');
        // Route::view('/profile','dashboard.user.profile')->name('profile');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::prefix('profile')->name('profile.')->group(function(){
            Route::get('/settings',[DashboardController::class,'show'])->name('settings');
            Route::get('/fetch-data',[DashboardController::class,'fetchData']);
            Route::post('/editfullname',[DashboardController::class,'editfullname']); 
            Route::post('/editaddress',[DashboardController::class,'editaddress']); 
            Route::post('/editphone',[DashboardController::class,'editphone']); 
            Route::post('/editEmail',[DashboardController::class,'editEmail']); 
            Route::post('/editCitizenID',[DashboardController::class,'editCitizenID']); 
        });

        Route::view('/home','dashboard.user.home')->name('home');
        Route::post('/logout',[UserController::class,'logout'])->name('logout');
        
    });
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');   
    });

    Route::middleware(['auth:admin'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home'); 
    });
});


// KHANG
Route::get('admin', function () {
    return view('admin_home');
});
Route::get('admin/profile', function () {
    return view('admin.adminprofile.adminprofile');
});
// group lai sau
Route::get('admin/showroom', function () {
    return view('admin.showroom.order');
});
Route::get('admin/showroom/check', function () {
    return view('admin.showroom.ordercheck');
});
Route::get('admin/showroom/myorder', function () {
    return view('admin.showroom.myorder');
});
Route::get('admin/showroom/ordercanceled', function () {
    return view('admin.showroom.ordercancel');
});
Route::get('admin/showroom/carreceive', function () {
    return view('admin.showroom.carreceive');
});
// 
Route::get('admin/warehouse', function () {
    return view('admin.warehouse.car');
});
Route::get('admin/stock', function () {
    return view('admin.warehouse.stock');
});
Route::get('admin/warehouse/delete', function () {
    return view('admin.warehouse.cardelete');
});
Route::get('admin/warehouse/ordering', function () {
    return view('admin.warehouse.car_ordering');
});Route::get('admin/warehouse/released', function () {
    return view('admin.warehouse.car_released');
});
Route::get('admin/warehouse/create', function () {
    return view('admin.warehouse.createcar');
});
Route::get('admin/general', function () {
    return view('admin.general.report');
});
Route::get('admin/login', function () {
    return view('admin.adminprofile.adminlogin');
});
// Route::view('/profile','dashboard.user.profile')->name('profile');
// KHANGEND