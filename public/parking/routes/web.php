<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Validator as valid;



Route::get('', function(){
return 'test';
}, 'App\Http\Controllers\Admin\UsersController@login');
Route::post('userLoginSubmit', 'App\Http\Controllers\Admin\UsersController@userLoginSubmit');

Route::get('admin/login', 'App\Http\Controllers\Admin\UsersController@login');
Route::get('admin/registration', 'App\Http\Controllers\Admin\UsersController@registrationPage');

Route::post('admin/userLoginSubmit', 'App\Http\Controllers\Admin\UsersController@userLoginSubmit');
Route::get('admin/logout', 'App\Http\Controllers\Admin\UsersController@removeSession');

Route::post('admin/adduserdetails', 'App\Http\Controllers\Admin\UsersController@addUserDetails');

Route::post('admin/addvehicledetails', 'App\Http\Controllers\Admin\VehicleController@addVehicleDetails');
Route::post('admin/addCoupondetails', 'App\Http\Controllers\Admin\CouponController@addcoupondetails');


Route::get('admin/aboutus', 'App\Http\Controllers\Admin\AboutusController@index');
Route::post('admin/addaboutdetails', 'App\Http\Controllers\Admin\AboutusController@addAboutDetails');

Route::get('admin/condition', 'App\Http\Controllers\Admin\AboutusController@Condition');
Route::post('admin/addconditiondetails', 'App\Http\Controllers\Admin\AboutusController@addConditionDetails');

Route::get('admin/privacy', 'App\Http\Controllers\Admin\AboutusController@Privacy');
Route::post('admin/addprivacydetails', 'App\Http\Controllers\Admin\AboutusController@addPrivacyDetails');


Route::get('admin/qrcodegenerator', 'App\Http\Controllers\Admin\QrController@index');
Route::post('admin/genrateqrcode', 'App\Http\Controllers\Admin\QrController@createqrcode');


Route::get('admin/orders', 'App\Http\Controllers\Admin\OrderController@Ordered');









Route::group(['middleware' => ['userAuth']], function () {
    Route::get('admin', 'App\Http\Controllers\Admin\HomeController@index');
    Route::get('admin/index', 'App\Http\Controllers\Admin\HomeController@index');

    Route::get('admin/users', 'App\Http\Controllers\Admin\UsersController@index');
    Route::get('admin/allusers', 'App\Http\Controllers\Admin\UsersController@show');
    Route::get('admin/deleteUsers/{id}', 'App\Http\Controllers\Admin\UsersController@delete');
    Route::post('admin/getUserDetails', 'App\Http\Controllers\Admin\UsersController@getUserDetails');
    Route::post('admin/updateUserDetails', 'App\Http\Controllers\Admin\UsersController@changeUserDetails');
    

    Route::get('admin/setting', 'App\Http\Controllers\Admin\SettingController@index');
    Route::post('save_setting', 'App\Http\Controllers\Admin\SettingController@save_setting');
    
    Route::post('/save_change_password', 'App\Http\Controllers\Admin\changePasswordController@save_change_password');

    Route::get('admin/vehicle', 'App\Http\Controllers\Admin\VehicleController@index');
    Route::get('admin/deleteVehicle/{id}', 'App\Http\Controllers\Admin\VehicleController@delete');
    Route::post('admin/getVehicleDetails', 'App\Http\Controllers\Admin\VehicleController@getVehicleDetails');
    Route::post('admin/updatevehicleDetails', 'App\Http\Controllers\Admin\VehicleController@changeVehicleDetails');

    Route::get('admin/vehicleregistration', 'App\Http\Controllers\Admin\VehicleController@vehiclergistration');

    




    Route::get('admin/coupon', 'App\Http\Controllers\Admin\CouponController@index');
    Route::post('admin/getCouponDetails', 'App\Http\Controllers\Admin\CouponController@Getcoupondetails');
    Route::get('admin/deleteCoupon/{id}', 'App\Http\Controllers\Admin\CouponController@delete');
    });
