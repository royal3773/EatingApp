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
        $reservations = Reservation::where('admin_id', $admin_id)->get();
        $events = [];
        foreach($reservations as $reservation)
        {
            $event['title'] = $reservation->user->name;
            $event['start'] = $reservation->date;
            $events[] = $event;
        }
        echo json_encode($events);
    }
    public function eventsmonth()
    {
        $admin_id = Auth::id();
        $dates = Reservation::where('admin_id', $admin_id)->select('date', 'count', DB::raw('DATE_FORMAT(date, "%Y-%m-%d") as eventsday'))->get('date')->groupBy('eventsday');
        // dd($dates);
        $days = [];
        $pairs = [];
        $counts = [];
        foreach($dates as $key => $date)
        {
            $pair = $date->count();
            $pairs[] = $pair;
            $day = $key;
            $days[] = $day;
            $counter = 0;
            for($i=0; $i<$pair; $i++)
            {
                $count = $date[$i]->count;
                $counter += $count;
            }
            $counts[] = $counter;
        }
        dump($dates);
        dump($days);
        dump($pairs);
        dd($counts);

    }
    // foreach($reservations as $reservation)
    // {
        //  $reservation['start']
    //日付が同じものを抽出して人数を足す　日付と合計値を１つの配列に代入.
    // title: 'The Title', // a property!
    // start: '2018-09-01', // a property!
    // end: '2018-09-02'
}
