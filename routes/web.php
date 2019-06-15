<?php

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

//Route::get('/', function () {
//    return 'first page';
//});
Route::get('/','Frontend\HomeController@index');
Route::get('/venom-categories','Frontend\HomeController@venomCategories');
Route::get('categories/{id}/subcategories','Frontend\HomeController@subcategories');
Route::get('/contact-us','Frontend\HomeController@contactUs');
Route::get('/venom/{id}','Frontend\HomeController@venom');
Route::post('/send-message','Frontend\HomeController@sendMessage');
Route::get('/change-locale','Frontend\HomeController@changeLocale');



//login
Route::get('/login', 'Frontend\HomeController@loginPage')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', 'Backend\DashboardController@index');
    Route::get('/dashboard', 'Backend\DashboardController@index');

    //Categories
    Route::get('/categories', 'Backend\CategoriesController@index');
    Route::post('/categories', 'Backend\CategoriesController@store');
    Route::get('/categories/{id}', 'Backend\CategoriesController@edit');
    Route::put('/categories/{id}', 'Backend\CategoriesController@update');
    Route::delete('/categories/{id}', 'Backend\CategoriesController@destroy');
    Route::get('/create-category', 'Backend\CategoriesController@create');

    //Subcategories
    Route::get('/subcategories', 'Backend\SubcategoriesController@index');
    Route::post('/subcategories', 'Backend\SubcategoriesController@store');
    Route::get('/subcategories/{id}', 'Backend\SubcategoriesController@edit');
    Route::put('/subcategories/{id}', 'Backend\SubcategoriesController@update');
    Route::delete('/subcategories/{id}', 'Backend\SubcategoriesController@destroy');
    Route::get('/create-subcategory', 'Backend\SubcategoriesController@create');

    //Venom
    Route::get('/venom', 'Backend\VenomController@index');
    Route::post('/venom', 'Backend\VenomController@store');
    Route::get('/venom/{id}', 'Backend\VenomController@edit');
    Route::put('/venom/{id}', 'Backend\VenomController@update');
    Route::delete('/venom/{id}', 'Backend\VenomController@destroy');
    Route::get('/create-venom', 'Backend\VenomController@create');

    Route::get('/categories/{id}/get-subcategory','Backend\CategoriesController@getSubcategory');

    //Mailing
    Route::get('/messages','Backend\MessagesController@index');
    Route::get('/messages/{id}','Backend\MessagesController@show');
    Route::delete('/message/{id}','Backend\MessagesController@index');
});




