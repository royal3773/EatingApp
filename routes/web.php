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

//トップ画面
Route::get('/', 'UsertopController@index');


//ユーザー側のログイン機能
Auth::routes();
//チャット画面
Route::get('/chat/{recieve}' , 'MessageController@index')->name('chat');
Route::post('/chat/send' , 'MessageController@store')->name('chatSend');


//ユーザー側のログイン後の画面
Route::get('/user/top', 'HomeController@index');
//お店情報を表示SearchRestaurant
Route::post('/user/top/search_keyword', 'User\SearchRestaurantController@keyword');
Route::get('/user/top/search_keyword', 'User\SearchRestaurantController@keyword');
//チャット選択画面
Route::get('/user/userchatselect', 'Chat\HomeChatController@user_chat_select_index')->middleware('auth');


//お店側のログイン機能を実装
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
//お店側の登録機能を実装
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
//homeへアクセスするルート情報。ログインしていないとlogin画面へリダイレクトされる。
Route::view('/admin/top', 'admin_screen.admintop')->middleware('auth:admin');
//チャット選択画面
Route::get('/admin/adminchatselect', 'Chat\HomeChatController@admin_chat_select_index')->middleware('auth:admin');


Route::get('test', 'TestController@index');
// Route::get('/userlogin', 'UsertopController@indexlogin');
// Route::get('chat', 'HomeController@chatindex');
