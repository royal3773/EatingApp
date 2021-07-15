<?php
namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;//通知機能を実装する
    
    protected $guard = 'admin';//デフォルトのユーザーガードを使用しない場合は指定する必要がある。

    protected $fillable = [
        'shopid', 'name', 'password', 'mail', 'tel', 'address', 'image'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name' => ['required', 'string', 'max:50'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'mail' => ['required', 'email', 'max:50', 'unique:admins'],
        'tel' => ['required', 'numeric', 'digits_between:8,20'],
        'address' => ['required', 'string', 'max:100'],
        // 'image' => ['image', 'max:100'],
    ];

    public static $message = [
        'name.required' => '名前は必須項目です',
        'name.string' => '名前は文字で入力して下さい',
        'name.max' => '名前は50文字以内で入力して下さい',
        'password.required' => 'パスワードは必須項目です',
        'password.min' => 'パスワードは８文字以上必要です',
        'password.confirmed' => '確認用パスワードが一致しません',
        'mail.required' => 'メールアドレスは必須項目です',
        'mail.email' => 'こちらのアドレスは不正です',
        'mail.max' => 'メールアドレスは50文字以内で入力して下さい',
        'mail.unique' => 'こちらのメールアドレスはすでに登録されています',
        'tel.required' => '電話番号は必須項目です。',
        'tel.numeric' => '電話番号は半角数字で入力して下さい',
        'tel.digits_between' => '電話番号は8桁以上で入力して下さい',
        'address.required' => '住所は必須項目です',
        'address.string' => '住所は文字で入力して下さい',
        'address.max' => '住所は100文字以下で入力して下さい',
        // 'image.image' => 'こちらは画像や写真の拡張子で入力して下さい',
        // 'image.max' => 'ファイル名は100文字以内で入力して下さい',
    ];
    public static $rules_text = [
        'name' => ['required', 'string', 'max:50'],
        'mail' => ['required', 'email', 'max:50', 'unique:admins'],
        'tel' => ['required', 'numeric', 'digits_between:8,20'],
        'address' => ['required', 'string', 'max:100'],
    ];
    public static $message_text = [
        'name.required' => '名前は必須項目です',
        'name.string' => '名前は文字で入力して下さい',
        'name.max' => '名前は50文字以内で入力して下さい',
        'mail.required' => 'メールアドレスは必須項目です',
        'mail.email' => 'こちらのアドレスは不正です',
        'mail.max' => 'メールアドレスは50文字以内で入力して下さい',
        'mail.unique' => 'こちらのメールアドレスはすでに登録されています',
        'tel.required' => '電話番号は必須項目です。',
        'tel.numeric' => '電話番号は半角数字で入力して下さい',
        'tel.digits_between' => '電話番号は8桁以上で入力して下さい',
        'address.required' => '住所は必須項目です',
        'address.string' => '住所は文字で入力して下さい',
        'address.max' => '住所は100文字以下で入力して下さい',
    ];
    public static $rules_password = [
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];
    public static $message_password = [
        'password.required' => 'パスワードは必須項目です',
        'password.min' => 'パスワードは８文字以上必要です',
        'password.confirmed' => '確認用パスワードが一致しません',
    ];

}