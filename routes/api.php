<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AllproductController;
use App\Http\Controllers\Api\FavouriteEventController;
use App\Http\Controllers\Api\FavouriteEventController1;

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
Route::post('login', 'App\Http\Controllers\ApiController@login');

Route::get('upcomingevent/{event_name?}', [FavouriteEventController::class, 'upcomingevent']);
Route::get('monitor', [FavouriteEventController::class, 'monitor']);
Route::get('showmore/{event_name}', [FavouriteEventController::class, 'showmore']);
Route::get('venname/{name?}', [FavouriteEventController::class, 'venname']);
Route::get('google/{name?}', [FavouriteEventController::class, 'google']);
Route::get('favourite_events', [FavouriteEventController::class, 'index']);
Route::get('notes', [FavouriteEventController::class, 'notes']);
Route::get('calendar', [FavouriteEventController::class, 'calendar']);
Route::post('addfavourite_events', [FavouriteEventController::class, 'create']);
Route::post('deletefavourite_events', [FavouriteEventController::class, 'delete']);
Route::get('eventid', [FavouriteEventController::class, 'event']);
Route::get('facebook', [FavouriteEventController::class, 'facebook']);
Route::get('trend', [FavouriteEventController::class, 'trend']);
Route::post('searchTag', 'App\Http\Controllers\Admin\ReviewWorkController@showTables');
Route::get('billboard', [FavouriteEventController::class, 'billboard']);
Route::get('facebookapi', [FavouriteEventController::class, 'facebookapi']);
Route::get('youtube/{name?}', [FavouriteEventController::class, 'youtube']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
