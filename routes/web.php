<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\ChangeLanguageController;
use App\Http\Controllers\User\UserOrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\EmployeeAccountController;
use App\Http\Controllers\EmployeeInfoController;
use App\Http\Controllers\ModelInfoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\CarInfoController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ShowroomController;
use App\Http\Controllers\StockController;

use App\Models\showroom;
use App\Models\modelInfo;

use Database\Seeders\CarInfo;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
   
    return redirect()->route('user.home');
});

Route::get('/lang/{locale?}',[ChangeLanguageController::class,'switch']);

// Route::get('/expectedPrice',function(){
//     return view('expectedPrice');
// })->middleware('Localization');

Auth::routes();

Route::prefix('user')->name('user.')->group(function(){
    // Guest - User UnAuthenticated
    Route::middleware(['guest:web','PreventBackHistory','Localization'])->group(function(){
            
            Route::get('/fetchInfo_Layout',[UserController::class,'fetchInfo_Layout'])->name('fetchInfo_Layout');
            Route::get('/home',[UserController::class,'home'])->name('home'); //guest homepage
            //Authenticate Page
            Route::get('/login',[UserController::class,'loadLayoutLogin'])->name('login'); 
            Route::get('/register',[UserController::class,'loadLayoutRegister'])->name('register');
            Route::post('/create',[UserController::class,'create'])->name('create');
            Route::post('/authenticate',[UserController::class,'authenticate'])->name('authenticate');
            //Order Page
            Route::get('/order/{id?}',[UserOrderController::class,'GuestOrder'])->name('GuestOrder');
            Route::post('/getModelInfo',[UserOrderController::class,'getModelInfo'])->name('getModelInfo');
            Route::post('/getShowRoom',[UserOrderController::class,'getShowRoom'])->name('getShowRoom');
            Route::post('/getShowRoomAddress',[UserOrderController::class,'getShowRoomAddress'])->name('getShowRoomAddress');
            Route::post('/SubmitOrder',[UserOrderController::class,'GuestSubmitOrder'])->name('GuestSubmitOrder');
            //Cost Estimation Page
            Route::get('/CostEstimate',[UserOrderController::class,'CostEstimate'])->name('CostEstimate');

        });
    
    // Customer - User Authenticated
    Route::middleware(['auth:web','PreventBackHistory','Localization'])->group(function(){
        //Customer Profile Page
        Route::get('/auth/fetchInfo_Layout_auth',[UserController::class,'fetchInfo_Layout_auth'])->name('fetchInfo_Layout_auth');
        Route::prefix('profile')->name('profile.')->group(function(){
            Route::get('auth/settings',[DashboardController::class,'show'])->name('settings');
            Route::get('auth/fetch-data',[DashboardController::class,'fetchData']);
            Route::post('auth/editfullname',[DashboardController::class,'editfullname']); 
            Route::post('auth/editaddress',[DashboardController::class,'editaddress']); 
            Route::post('auth/editphone',[DashboardController::class,'editphone']); 
            Route::post('auth/editEmail',[DashboardController::class,'editEmail']); 
            Route::post('auth/editCitizenID',[DashboardController::class,'editCitizenID']); 
            Route::post('auth/editAvatar',[DashboardController::class,'editAvatar']); 
        });
        //Function page for customer
            Route::get('auth/home',[UserController::class,'home_auth'])->name('home_auth'); //customer homepage
            //Customer Order Page 
            Route::get('auth/order/{id?}',[UserOrderController::class,'CustomerOrder'])->name('CustomerOrder');
            Route::get('auth/testQueryString',[UserOrderController::class,'testQueryString'])->name('testQueryString');
            Route::post('/getModelInfo',[UserOrderController::class,'getModelInfo'])->name('getModelInfo');
            Route::post('/getShowRoom',[UserOrderController::class,'getShowRoom'])->name('getShowRoom');
            Route::post('/getShowRoomAddress',[UserOrderController::class,'getShowRoomAddress'])->name('getShowRoomAddress');
            Route::post('/CustomerSubmitOrder',[UserOrderController::class,'CustomerSubmitOrder'])->name('CustomerSubmitOrder');
            //Customer Cost Estimation
            Route::get('auth/CostEstimate',[UserOrderController::class,'CostEstimate'])->name('CostEstimate');
            //Logout 
            Route::post('auth/logout',[UserController::class,'logout'])->name('logout');
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
// Route::get('admin/showroom', function () {
//     return view('admin.showroom.order');
// });



Route::get('/test',[ModelInfoController::class,'compare']);



// 



Route::get('admin/warehouse/create', function () {
    return view('admin.warehouse.createcar');
});

Route::get('admin/profile', function () {
    return view('admin.adminprofile.adminprofile');
});

Route::get('admin/showroom',[OrderDetailController::class,'show']);
Route::get('admin/showroom/check',[OrderDetailController::class,'orderedstatus']);
Route::get('admin/showroom/myorder',[OrderDetailController::class,'orderedstatus']);
Route::get('admin/showroom/ordercanceled',[OrderDetailController::class,'custcanceledtatus']);
Route::get('admin/showroom/orderdetail/{order_id}/{model_id}',[OrderDetailController::class,'orderdetail']);
Route::get('admin/showroom/carmanage',[CarInfoController::class,'showroomcar']);
Route::get('admin/showroom/carmanagepending',[CarInfoController::class,'showroomcarpending']);
Route::get('admin/showroom/carmanageshowroom',[CarInfoController::class,'showroomcarreceived']);

Route::get('admin/general/employee',[EmployeeInfoController::class,'show']);
Route::post('admin/general/employee/create',[EmployeeAccountController::class,'create']);
// Route::post('admin/general/employee/create', 'EmployeeAccountController@create');
Route::get('admin/general/customer',[DashboardController::class,'showcustlist']);
Route::get('admin/general/customer/edit/{id}',[DashboardController::class,'edit']);
Route::get('admin/general/report',[ReportController::class,'report']);
Route::get('admin/general/empcreate', [ShowroomController::class,'create']);






Route::get('admin/warehouse',[CarInfoController::class,'show']);
Route::get('admin/warehouse/ordering',[OrderDetailController::class,'confirmtatus']);
Route::get('admin/warehouse/delete', [CarInfoController::class,'carcancel']);
Route::get('admin/warehouse/stock', [StockController::class,'show']);
Route::get('admin/warehouse/stockadd/{id}', [StockController::class,'addstock']);

Route::get('admin/warehouse/released',[CarInfoController::class,'released']);







// ok
Route::prefix('admin')->name('admin.')->group(function(){
  
    Route::middleware(['guest:employee','PreventBackHistory'])->group(function(){
        Route::view('/login','admin.adminprofile.adminlogin')->name('login');
        Route::post('/authenticate',[EmployeeAccountController::class,'authenticate'])->name('authenticate');
    });

    Route::middleware(['auth:employee','PreventBackHistory'])->group(function(){
        Route::view('/home','admin_home')->name('home');
        Route::view('/general','admin.general.general');
      
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
