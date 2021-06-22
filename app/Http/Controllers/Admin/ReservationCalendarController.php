<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Model\User;
use App\Model\Admin;
use App\Model\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservationCalendarController extends Controller
{
    private function admin_id()
    {
        $admin_id = Auth::id();
        return Reservation::where('admin_id', $admin_id)->get();
    }

    public function index()
    {
        return view('admin_screen.reservationcalendar');
    }

    public function events()
    {
        $admin_id = Auth::id();
        $reservations = Reservation::where('admin_id', $admin_id)->selectRaw("DATE_FORMAT(date, '%Y-%m-%eT%H:%i') as time, count, comment, user_id")->get();
        $events = [];
        
        foreach($reservations as $reservation)
        {
            if($reservation->comment){
                $event['title'] = $reservation->user->name."　".$reservation->count."名"."　連絡事項　".$reservation->comment;
            }else{
                $event['title'] = $reservation->user->name."　".$reservation->count."名"."　連絡事項　無し";
            }
            // dd($reservations);
            $event['start'] = $reservation->time;
            $events[] = $event;
        }
        // dd($events);
        echo json_encode($events);
    }
    public function eventsmonth()
    {
        $admin_id = Auth::id();
        //日付、日付ごとの組数、日付ごとの人数の合計を取得
        $dates = Reservation::where('admin_id', $admin_id)->selectRaw("DATE_FORMAT(date, '%Y-%m-%e') as eventsday ,COUNT(count) as pairs ,SUM(count) as total_count")->groupBy('eventsday')->get();
        $events = [];
        foreach($dates as $date)
        {
            $event['title'] = $date->total_count."人".$date->pairs."組";
            $event['start'] = $date->eventsday;
            $event['escription'] = '2泊3日（7日6:00～9日22:00）';
            $events[] = $event;
        }
        echo json_encode($events);
    }
}
