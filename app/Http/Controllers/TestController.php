<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TestController extends Controller
{
    public function index()
    {

        return view('test');
    }
    // ーーここまで追記ーー
}
