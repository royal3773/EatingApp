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
//ユーザー側
Route::get('Users', 'Api\UserController@index');
Route::get('Users/{id}', 'Api\UserController@get');
Route::post('Users', 'Api\UserController@pget');
Route::post('Users/api_register', 'Api\UserController@register');
//お店側
Route::get('Admins', 'Api\AdminController@index');
Route::get('Admins/{id}', 'Api\AdminController@get');
Route::post('Admins', 'Api\AdminController@pget');
Route::post('Admins/api_register', 'Api\AdminController@register');

