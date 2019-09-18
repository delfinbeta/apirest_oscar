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
Route::middleware('cors')->group(function(){
   
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

        Route::post('categories/create','CategoryController@store');
        Route::get('/categories/{category}','CategoryController@show');
		Route::put('/categories/{category}/edit','CategoryController@update')->where('category','[0-9]+');
		Route::patch('/categories/{category}/trash','CategoryController@delete')->where('category','[0-9]+');
		Route::get('/categories/{id}/restore','CategoryController@restore')->where('id','[0-9]+');
		Route::delete('/categories/{id}/destroy','CategoryController@destroy')->where('id','[0-9]+');
    });
});
        Route::get('categories','CategoryController@index');
});