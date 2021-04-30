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
}