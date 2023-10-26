<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MobileController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('admin/mobileapi', 'App\Http\Controllers\Admin\MobileController@index');

Route::post('mobile', [MobileController::class, 'index']);

Route::post('validate_otp', [MobileController::class, 'validate1']);

Route::post('updateprofile', [MobileController::class, 'profileupdate']);

Route::post('getuserdetails', [MobileController::class, 'userprofile']);

Route::post('addcarddetails', [MobileController::class, 'Addcarddata']);

Route::post('detailsmobile', [MobileController::class, 'qrscannerdata']);

Route::get('aboutus', [Mobilecontroller::class,'aboutusdata']);

Route::get('conditions', [Mobilecontroller::class,'conditionsdata']);

Route::get('privacy', [Mobilecontroller::class,'privacydata']);

Route::post('loaddocuments', [Mobilecontroller::class,'Documentsdata']);

Route::get('getdocuments', [Mobilecontroller::class,'Getdocumentsdata']);

Route::get('getreminder', [Mobilecontroller::class,'Getreminderdata']);

Route::post('savereminder', [Mobilecontroller::class,'Savereminderdata']);

Route::get('getreminder_userid', [Mobilecontroller::class,'Userreminderdata']);

Route::post('notregistration', [MobileController::class, 'Newregister']);

Route::post('vehicleregistration', [MobileController::class, 'Vehicleregister']);

Route::post('vehicledetails', [MobileController::class, 'Vehicleregisterdetails']);

Route::post('saveAddress', [MobileController::class, 'saveAddress']);
Route::post('getUserAddressList', [MobileController::class, 'getUserAddressList']);

Route::post('saveOrder', [MobileController::class, 'saveOrder']);
Route::post('purchasedQrCode', [MobileController::class, 'purchasedQrCode']);
Route::post('checkKitNoExist', [MobileController::class, 'checkKitNoExist']);
Route::get('getAllStates', [MobileController::class, 'getAllStates']);
Route::post('getStateCities', [MobileController::class, 'getStateCities']);

Route::post('setReminder', [MobileController::class, 'setreminder']);
Route::get('notifyReminder', [MobileController::class, 'notifyreminder']);