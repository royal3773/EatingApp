<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user_screen.usertop');
    }

}







    
    // public function chatindex()
    // {
    //     $user = Auth::user();//現在ログインしているユーザーの情報を取得
    //     $users = User::where('id', '<>', $user->id)->get();//現在ログインしているユーザー以外のIDを取得
    //     $admins = Admin::all();
    //     return view('chat_user_select', ['users' => $users, 'admins' => $admins]);
    // }
// }
