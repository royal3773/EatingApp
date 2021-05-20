<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;//通知機能を実装する
    
    protected $guard = 'admin';//デフォルトのユーザーガードを使用しない場合は指定する必要がある。

    protected $fillable = [
        'password','name', 'mail', 'tel', 'address', 'image'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name' => ['required', 'string', 'max:50'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'email' => ['required', 'email', 'max:50', 'unique:admins'],

    ];

    public static $message = [
        'name.required' => '名前は必須項目です',
        'name.string' => '名前は文字で入力して下さい',
        'name.max' => '名前は50文字以内で入力して下さい',
        'password.required' => 'パスワードは必須項目です',
        'password.min' => 'パスワードは８文字以上必要です',
        'password.confirmed' => '確認用パスワードの値が一致しません',
        'email.required' => 'メールアドレスは必須項目です',
        'email.email' => 'こちらのアドレスは不正です',
        'email.max' => 'メールアドレスは50文字以内で入力して下さい。',
        'email.unique' => 'こちらのメールアドレスはすでに登録されています。',

    ];

}