<?php

namespace App;

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
}
