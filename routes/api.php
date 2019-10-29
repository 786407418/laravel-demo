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

Route::group(['middleware'=>'auth.jwt'],function(){
    Route::get('/demo','\App\Http\Controllers\DemoController@index');
});


Route::post('/user/login','\App\Http\Controllers\UserController@login');
Route::post('/user/register','\App\Http\Controllers\UserController@register');
