<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *update, fill, createの処理が実行された時、値が挿入される
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'email', 'birthday', 'sex', 'tel', 'address', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *秘匿性の高いものについて指定することで、json形式に含まれなくなる。
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *指定したカラムを指定したデータ型で、データベースから返してくれる。
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules = [
        'name' => ['required', 'string', 'max:50'],
        'email' => ['required', 'email', 'max:50', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'birthday' => ['required', 'before:"now"'],
        'sex' => ['required', 'string', 'max:5'],
        'tel' => ['required', 'numeric', 'digits_between:8,20'],
        'address' => ['required', 'string', 'max:100'],
        'image' => ['max:100'],
    ];
    public static $message = [
        'name.required' => '名前は必須項目です',
        'name.string' => '名前は文字で入力して下さい',
        'name.max' => '名前は50文字以内で入力して下さい',
        'email.required' => 'メールアドレスは必須項目です',
        'email.email' => 'こちらのアドレスは不正です',
        'email.max' => 'メールアドレスは50文字以内で入力して下さい。',
        'email.unique' => 'こちらのメールアドレスはすでに登録されています。',
        'password.required' => 'パスワードは必須項目です',
        'password.min' => 'パスワードは８文字以上必要です',
        'password.confirmed' => '確認用パスワードが一致しません',
        'birthday.required' => '誕生日は必須項目です',
        'birthday.before' => '値が無効です',
        'sex.required' => '性別は必須項目です',
        'sex.string' => '性別は選択肢から選んで下さい',
        'sex.max' => '性別は5文字以内です',
        'tel.required' => '電話番号は必須項目です。',
        'tel.numeric' => '電話番号は半角数字で入力して下さい',
        'tel.digits_between' => '電話番号は8桁以上で入力して下さい',
        'address.required' => '住所は必須項目です',
        'address.string' => '住所は文字で入力して下さい',
        'address.max' => '住所は100文字以下で入力して下さい',
        // 'image.image' => 'こちらは画像や写真の拡張子で入力して下さい',
        'image.max' => 'ファイル名は100文字以内で入力して下さい',
    ];
}
