<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use App\Model\Admin;
use App\Model\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservationCalendarController extends Controller
{
    public function index()
    {
        return view('admin_screen.reservationcalendar');
    }
}
