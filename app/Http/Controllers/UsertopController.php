<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsertopController extends Controller
{
    public function index()
    {
        return view('auth.usertop');
    }
    public function loginindex()
    {
        return view('auth.userlogin');
    }
}
