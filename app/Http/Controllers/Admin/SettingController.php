<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use App\Model\Admin;
use App\Model\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        return view('admin_screen.setting', ['admin' => $admin]);
    }
    public function show()
    {
        $admin = Auth::user();
        return view('admin_screen.setting_show', ['admin' => $admin]);
    }
}
