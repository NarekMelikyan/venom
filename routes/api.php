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

Route::get('/venom-categories','Frontend\HomeController@venomCategories');
Route::get('categories/{id}/subcategories','Frontend\HomeController@subcategories');
Route::get('/contact-us','Frontend\HomeController@contactUs');
Route::get('/venom/{id}','Frontend\HomeController@venom');
Route::post('/send-message','Frontend\HomeController@sendMessage');
Route::get('/change-locale','Frontend\HomeController@changeLocale');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
