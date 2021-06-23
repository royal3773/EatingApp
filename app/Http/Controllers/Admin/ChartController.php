<?php

namespace App\Http\Controllers\Admin;


use DB;
use App\Model\User;
use App\Model\Admin;
use App\Model\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function index()
    {
        $keys = ['家','研究室','外出','学内','長期不在'];
        $counts = [10,4,3,2,1];
        return view('admin_screen.chart',compact('keys','counts'));
    }
}
