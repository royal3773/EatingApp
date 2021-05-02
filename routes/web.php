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

Route::get('/', function () {
    return view('welcome');
});
//ユーザー側のログイン機能
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//お店側のログイン機能を実装
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
//お店側の登録機能を実装
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
//homeへアクセスするルート情報。ログインしていないとlogin画面へリダイレクトされる。
Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin')->middleware('auth');