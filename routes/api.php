<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('signup', 'Api\AuthApiController@signup');
Route::post('login', 'Api\AuthApiController@login');
Route::post('forgot-password', 'Api\AuthApiController@forgetPassword');

Route::group(['middleware' => 'auth:api'], function() {
	Route::get('get-profile', 'Api\CustomerApiController@profile');
	Route::post('update-profile', 'Api\CustomerApiController@updateProfile');
	Route::post('update-profile-picture', 'Api\CustomerApiController@updateProfilePicture');
	Route::post('change-password', 'Api\CustomerApiController@changePassword');

});

Route::group(['middleware' => 'auth:api'], function() {
	Route::get('get-menu', 'Api\HardeesApiController@menu');
	Route::post('create-customer-deal', 'Api\HardeesApiController@createCustomDeal');

});

Route::group(['middleware' => 'auth:api'], function() {
	Route::post('place-order', 'Api\OrderApiController@placeOrder');

});