<?php

namespace App\Http\Controllers\Chat;

use App\Model\User;
use App\Model\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeChatController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    //ユーザーがお店側を選ぶ
    public function user_chat_select_index()
    {
        $user = Auth::user();//現在ログインしているユーザーの情報を取得
        $admins = Admin::all();
        return view('user_screen.user_chat_select', ['admins' => $admins]);
    }
    //お店側がユーザーを選ぶ
    public function admin_chat_select_index()
    {
        $users = User::all();
        return view('admin_screen.admin_chat_select', ['users' => $users]);
    }
}
