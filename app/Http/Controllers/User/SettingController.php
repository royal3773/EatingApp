<?php

namespace App\Http\Controllers\User;

use App\Model\User;
use App\Model\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('user_screen.setting', ['user' => $user]);
    }
    public function show() {
        $user = Auth::user();
        return view('user_screen.setting_show', ['user' => $user]);
    }
}
