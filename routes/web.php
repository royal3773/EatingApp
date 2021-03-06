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
Route::get('/user/top/search_keyword', 'User\SearchRestaurantController@keyword')->middleware('auth');
Route::post('/user/top/search_keyword', 'User\SearchRestaurantController@keyword');
Route::post('/user/top/genre', 'User\SearchRestaurantController@genre');
Route::post('/user/top/special_feature', 'User\SearchRestaurantController@special_feature');
// ペジネーション
Route::get('/user/top/keyword/{keyword}/{start}', 'User\SearchRestaurantController@keyword_pagination')->middleware('auth');
Route::get('/user/top/range/{lat}/{lng}/{start}', 'User\SearchRestaurantController@lat_lng_pagination')->middleware('auth');
Route::get('/user/top/genre/{genre}/{address}/{start}', 'User\SearchRestaurantController@genre_pagination')->middleware('auth');
Route::get('/user/top/special/{special}/{address}/{start}', 'User\SearchRestaurantController@special_pagination')->middleware('auth');

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
Route::get('/user/setting/show', 'User\SettingController@show')->middleware('auth');
Route::get('/user/setting/edit', 'User\SettingController@edit')->middleware('auth');
//名前の変更
Route::get('/user/setting/edit/name/', 'User\SettingController@edit_name')->middleware('auth');
Route::post('/user/setting/edit/name/{user_id}', 'User\SettingController@update_name');
//メールアドレス変更
Route::get('/user/setting/edit/email/', 'User\SettingController@edit_email')->middleware('auth');
Route::post('/user/setting/edit/email/{user_id}', 'User\SettingController@update_email');
//パスワード変更
Route::get('/user/setting/edit/password/', 'User\SettingController@edit_password')->middleware('auth');
Route::post('/user/setting/edit/password/{user_id}', 'User\SettingController@update_password');
//電話番号変更
Route::get('/user/setting/edit/tel/', 'User\SettingController@edit_tel')->middleware('auth');
Route::post('/user/setting/edit/tel/{user_id}', 'User\SettingController@update_tel');
//住所変更
Route::get('/user/setting/edit/address/', 'User\SettingController@edit_address')->middleware('auth');
Route::post('/user/setting/edit/address/{user_id}', 'User\SettingController@update_address');
//画像変更
Route::get('/user/setting/edit/image/', 'User\SettingController@edit_image')->middleware('auth');
Route::post('/user/setting/edit/image/{user_id}', 'User\SettingController@update_image');
//画像登録
Route::post('/user/setting/edit/register/image/{user_id}', 'User\SettingController@register_image');
//行ったことあるお店履歴
Route::get('/user/setting/reservation', 'User\SettingController@reservation_history')->middleware('auth');


//お店側のログイン
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
//お店側の登録機能
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
//homeへアクセスするルート情報。ログインしていないとlogin画面へリダイレクトされる。
Route::get('/admin/top', 'Admin\TopController@index')->middleware('auth:admin');
//チャット選択画面
Route::get('/admin/adminchatselect', 'Chat\HomeChatController@admin_chat_select_index')->middleware('auth:admin');
//お店側予約確認
Route::get('/admin/reservation', 'Admin\ReservationCalendarController@index')->middleware('auth:admin');
Route::get('/admin/reservation/events', 'Admin\ReservationCalendarController@events')->middleware('auth:admin');
Route::get('/admin/reservation/events/month', 'Admin\ReservationCalendarController@eventsmonth')->middleware('auth:admin');
//グラフ画面
Route::get('/admin/chart', 'Admin\ChartController@index')->middleware('auth:admin');
//ユーザー設定画面
Route::get('/admin/setting', 'Admin\SettingController@index')->middleware('auth:admin');
Route::get('/admin/setting/edit', 'Admin\SettingController@edit')->middleware('auth:admin');
Route::post('/admin/setting/edit/{admin_id}', 'Admin\SettingController@update_text');
Route::post('/admin/setting/image/{admin_id}', 'Admin\SettingController@update_image');
Route::post('/admin/setting/password/{admin_id}', 'Admin\SettingController@update_password');

// Route::get('test', 'Admin\ChartController@index')->middleware('auth:admin');
Route::get('test', 'TestController@index')->middleware('auth:admin');
// Route::get('/userlogin', 'UsertopController@indexlogin');
// Route::get('chat', 'HomeController@chatindex');
