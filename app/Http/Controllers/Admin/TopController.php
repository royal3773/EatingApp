<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use App\Model\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    public function index() {
        $rankings = Reservation::selectRaw("admin_id, SUM(count) as total, admin_id")->groupBy('admin_id')->orderBy('total', 'desc')->take(5)->get()->toArray();
        foreach($rankings as $ranking)
        {
            $admin_name = Admin::find($ranking['admin_id'])->name;
            $admins_name[] = $admin_name;
        }
        return view('admin_screen.admintop', ['admins_name' => $admins_name, 'rankings' => $rankings]);
    }
}
