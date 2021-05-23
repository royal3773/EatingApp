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

// Route::get('/', function () {
//     return view('welcome');
// });
//ユーザー側のログイン機能
Auth::routes();
//ユーザー側のログイン後の画面
Route::get('/usertop', 'HomeController@index');
//お店側のログイン機能を実装
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
//お店側の登録機能を実装
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
//homeへアクセスするルート情報。ログインしていないとlogin画面へリダイレクトされる。
Route::view('/admintop', 'admin_screen.admintop')->middleware('auth:admin');
//チャットセレクト
Route::get('userchatselect', 'Chat\HomeChatController@userchatselectindex')->middleware('auth');
Route::get('adminchatselect', 'Chat\HomeChatController@adminchatselectindex')->middleware('auth:admin');
Route::get('chat', 'HomeController@chatindex');
//チャット画面
Route::get('/chat/{recieve}' , 'MessageController@index')->name('chat');
Route::post('/chat/send' , 'MessageController@store')->name('chatSend');

Route::get('/', 'UsertopController@index');

Route::get('/userlogin', 'UsertopController@indexlogin');

// Route::view('test', 'admin_screen.admintop');
