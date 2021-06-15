<?php

namespace App\Http\Controllers\User;

use App\Model\User;
use App\Model\Admin;
use App\Model\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{
    public function index($adminId)
    {
        $admin = Admin::find($adminId);
        $user_id = Auth::id();
        $user = User::find($user_id);
        $today = date("Y-m-d");
        $afterday = date("Y-m-d", strtotime($today. "+3 months"));
        return view('user_screen.reservation', ['admin' => $admin, 'user' => $user, 'today' => $today, 'afterday' => $afterday]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $reservation = new Reservation;
            $reservation->user_id = $request->input('user_id');
            $reservation->admin_id = $request->input('admin_id');
            $reservation->count = $request->input('count');
            
            $date = $request->input('date');
            $time = $request->input('time');
            $datetime = $date. " ". $time;
            $reservation->date = $datetime;

            $reservation->comment = $request->input('comment', NULL);
        $reservation->save();
        $user_name = $request->input('user_name');
        $message = $user_name. "様　ありがとうございます。予約は完了いたしました。万が一ご都合によりキャンセルされる場合は予約確認画面から早めの手続きをお願いします。";
        return view('user_screen.reservation', ['message' => $message]);
        // return redirect()->action('TestController@show', ['id' => 12]); 
    }
}
