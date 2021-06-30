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
Route::post('/user/top/genre', 'User\SearchRestaurantController@genre');
Route::post('/user/top/special_feature', 'User\SearchRestaurantController@special_feature');
//お気に入り機能
Route::get('/user/favorite', 'User\FavoriteController@index')->middleware('auth');
Route::post('/user/{favorite}/favorite', 'User\FavoriteController@store');
Route::post('/user/{favorite}/favorite_delete', 'User\FavoriteController@delete');
//チャット選択画面
Route::get('/user/userchatselect', 'Chat\HomeChatController@user_chat_select_index')->middleware('auth');
//予約画面
Route::get('/user/reservation/{adminId}', 'User\ReservationController@index')->middleware('auth');
Route::post('/user/reservation/{adminId}', 'User\ReservationController@store');
//予約確認画面
Route::get('/user/reservationcheck','User\ReservationController@indexcheck')->middleware('auth');
Route::delete('/user/reservationcheck', 'User\ReservationController@destroy');
//設定画面
Route::get('/user/setting', 'User\SettingController@index')->middleware('auth');


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
//お店側予約確認
Route::get('/admin/reservation', 'Admin\ReservationCalendarController@index')->middleware('auth:admin');
Route::get('/admin/reservation/events', 'Admin\ReservationCalendarController@events')->middleware('auth:admin');
Route::get('/admin/reservation/events/month', 'Admin\ReservationCalendarController@eventsmonth')->middleware('auth:admin');
//グラフ画面
Route::get('/admin/chart', 'Admin\ChartController@index')->middleware('auth:admin');

// Route::get('test', 'Admin\ChartController@index')->middleware('auth:admin');
Route::get('test', 'TestController@index')->middleware('auth:admin');
// Route::get('/userlogin', 'UsertopController@indexlogin');
// Route::get('chat', 'HomeController@chatindex');
