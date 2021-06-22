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
    //予約フォームページ
    public function index($adminId)
    {
        $admin = Admin::find($adminId);
        $user_id = Auth::id();
        $user = User::find($user_id);
        $today = date("Y-m-d");
        $afterday = date("Y-m-d", strtotime($today. "+3 months"));
        return view('user_screen.reservation', ['admin' => $admin, 'user' => $user, 'today' => $today, 'afterday' => $afterday]);
    }
    //予約確認画面
    public function indexcheck()
    {
        //日付が近い順に取得
        $user_id = Auth::id();
        $reservations = Reservation::where('user_id', $user_id)->oldest('date')->get();
        return view('user_screen.reservation_check', ['reservations' => $reservations]);
    }
    //予約登録処理
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
            $datetime = strtotime($datetime);
            $datetime = date('Y-m-d H:i:s', $datetime);
            $reservation->date = $datetime;

            $reservation->comment = $request->input('comment', NULL);
        $reservation->save();

        $admin_id = $request->input('admin_id');
        $user_name = $request->input('user_name');
        $flash_message = $user_name. "様　ありがとうございます。予約は完了いたしました。";
        session()->flash('flash_message', $flash_message);

        return redirect('user/reservation/'. $admin_id);
    }

    public function destroy(Request $request)
    {
        $reservation_id = $request->reservation_id;
        Reservation::where('id', $reservation_id )->delete();
        
        $admin_name = $request->admin_name;
        $date = $request->date;
        $flash_message = $admin_name. "の". $date. "からのご予約をキャンセルいたしました。";
        session()->flash('flash_message', $flash_message);
        return redirect('user/reservationcheck');
    }
}
