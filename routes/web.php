<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\ChangeLanguageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\EmployeeAccountController;
use App\Http\Controllers\EmployeeInfoController;
use App\Http\Controllers\ModelInfoController;

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
})->middleware("Localization");

Route::get('/lang/{locale?}',[ChangeLanguageController::class,'switch']);

Route::get('/expectedPrice',function(){
    return view('expectedPrice');
})->middleware('Localization');

Auth::routes();

Route::prefix('user')->name('user.')->group(function(){
    
    Route::middleware(['guest:web','PreventBackHistory','Localization'])->group(function(){
            Route::view('/login','dashboard.user.login')->name('login'); 
            Route::view('/register','dashboard.user.register')->name('register');
            Route::post('/create',[UserController::class,'create'])->name('create');
            Route::post('/authenticate',[UserController::class,'authenticate'])->name('authenticate');
        });
    
    
    Route::middleware(['auth:web','PreventBackHistory','Localization'])->group(function(){
        Route::prefix('profile')->name('profile.')->group(function(){
            Route::get('/settings',[DashboardController::class,'show'])->name('settings');
            Route::get('/fetch-data',[DashboardController::class,'fetchData']);
            Route::post('/editfullname',[DashboardController::class,'editfullname']); 
            Route::post('/editaddress',[DashboardController::class,'editaddress']); 
            Route::post('/editphone',[DashboardController::class,'editphone']); 
            Route::post('/editEmail',[DashboardController::class,'editEmail']); 
            Route::post('/editCitizenID',[DashboardController::class,'editCitizenID']); 
            Route::post('/editAvatar',[DashboardController::class,'editAvatar']); 
        });

        Route::view('/home','dashboard.user.home')->name('home');
        Route::post('/logout',[UserController::class,'logout'])->name('logout');
        
    });
});
    

// KHANG
// Route::get('admin', function () {
//     return view('admin_home');
// });
// Route::get('admin/profile', function () {
//     return view('admin.adminprofile.adminprofile');
// });
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
// Route::get('admin/login', function () {
//     return view('admin.adminprofile.adminlogin');
// });
Route::get('admin/general/employee',[EmployeeInfoController::class,'show']);
   

Route::get('admin/general/empcreate', function () {
    return view('admin.general.empcreate');
});
Route::get('admin/general/customer', function () {
    return view('admin.general.custmanage');
});


Route::prefix('admin')->name('admin.')->group(function(){
  
    Route::middleware(['guest:employee','PreventBackHistory'])->group(function(){
        Route::view('/login','admin.adminprofile.adminlogin')->name('login');
        Route::post('/authenticate',[EmployeeAccountController::class,'authenticate'])->name('authenticate');
    });

    Route::middleware(['auth:employee','PreventBackHistory'])->group(function(){
        Route::view('/home','admin_home')->name('home');
      
        // Route::prefix('employee')->name('employee.')->group(function(){
        //     Route::get('/profile',[DashboardController::class,'show'])->name('profile');
        //     Route::get('/fetch-data',[DashboardController::class,'fetchData']);
        //     Route::post('/editfullname',[DashboardController::class,'editfullname']); 
        //     Route::post('/editaddress',[DashboardController::class,'editaddress']); 
        //     Route::post('/editphone',[DashboardController::class,'editphone']); 
        //     Route::post('/editEmail',[DashboardController::class,'editEmail']); 
        //     Route::post('/editCitizenID',[DashboardController::class,'editCitizenID']); 
        //     Route::post('/editAvatar',[DashboardController::class,'editAvatar']); 
        // });

      
        Route::post('/logout',[EmployeeAccountController::class,'logout'])->name('logout');
        
    });
});

// Route::view('/profile','dashboard.user.profile')->name('profile');
// KHANGEND


Route::get('admin/general/add-model', function () {
    return view('admin.general.add_model',[ModelInfoController::class,'addModel']);
});

Route::get('admin/general/edit-model/{model_id}', function () {
    return view('admin.general.edit_model',[ModelInfoController::class,'editModel']);
});
Route::get('admin/general/deletemodel/{model_id}', function () {
    return view('admin.general.all_model',[ModelInfoController::class,'deleteModel']);
});
Route::get('admin/general/allmodel', function () {
    return view('admin.general.all_model');
    // ,[ModelInfoController::class,'allModel']);
});
Route::get('admin/general/save_model', function () {
    return view('admin.general.add_model',[ModelInfoController::class,'saveModel']);
});Route::get('admin/general/update_model/{model_id}', function () {
    return view('admin.general.all_model',[ModelInfoController::class,'updateModel']);
});
//model
// Route::get('', 'App\Http\Controllers\ModelController@addModel');
// Route::get('/edit-model/{model_id}', 'App\Http\Controllers\ModelController@editModel');
// Route::get('/delete-model/{model_id}', 'App\Http\Controllers\ModelController@deleteModel');
// Route::get('/all-model', 'App\Http\Controllers\ModelController@allModel');
// Route::post('/save-model', 'App\Http\Controllers\ModelController@saveModel');
// Route::post('/update-model/{model_id}', 'App\Http\Controllers\ModelController@updateModel');
