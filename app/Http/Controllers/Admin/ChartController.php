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
        $admin_id = Auth::id();
        //月別売上推移　棒グラフ
        $linequerys = Reservation::where('admin_id', $admin_id)->selectRaw("DATE_FORMAT(date, '%Y-%m') as month ,COUNT(count) as pairs ,SUM(count) as total_count")->groupBy('month')->get();
        $linearray = ["2021-01"=>0, "2021-02"=>0, "2021-03"=>0, "2021-04"=>0, "2021-05"=>0,"2021-06"=>0, "2021-07"=>0,"2021-08"=>0, "2021-09"=>0, "2021-10"=>0, "2021-11"=>0, "2021-12"=>0];
        foreach($linequerys as $linequery){
            $linearray[$linequery['month']] = intval($linequery['total_count']);
        }
        //取得したデータをそれぞれ配列に格納
        $linekeys = array_keys($linearray);
        $linecounts = array_values($linearray);
        //来月以降のデータを削除する処理
        $this_month = date('Y-m',strtotime('+1 month'));
        $search_month = array_search($this_month, $linekeys);
        $array_count = count($linekeys);
        $delete_num = $array_count - $search_month;
        array_splice($linekeys, $search_month, $delete_num);
        array_splice($linecounts, $search_month, $delete_num);

        $barweekquerys = Reservation::where('admin_id', $admin_id)
            ->selectRaw('SUM(CASE  DATE_FORMAT(date, "%w")  WHEN "0" THEN count ELSE 0 END) AS "日曜"')
            ->selectRaw('SUM(CASE  DATE_FORMAT(date, "%w")  WHEN "1" THEN count ELSE 0 END) AS "月曜"')
            ->selectRaw('SUM(CASE  DATE_FORMAT(date, "%w")  WHEN "2" THEN count ELSE 0 END) AS "火曜"')
            ->selectRaw('SUM(CASE  DATE_FORMAT(date, "%w")  WHEN "3" THEN count ELSE 0 END) AS "水曜"')
            ->selectRaw('SUM(CASE  DATE_FORMAT(date, "%w")  WHEN "4" THEN count ELSE 0 END) AS "木曜"')
            ->selectRaw('SUM(CASE  DATE_FORMAT(date, "%w")  WHEN "5" THEN count ELSE 0 END) AS "金曜"')
            ->selectRaw('SUM(CASE  DATE_FORMAT(date, "%w")  WHEN "6" THEN count ELSE 0 END) AS "土曜"')
            ->get();
        // dd($barweekquerys);
        $barweekvalues = [];
        $barweekkeys = [];

        $baravgweekquerys = Reservation::select('admin_id')
        ->selectRaw('SUM(CASE  DATE_FORMAT(date, "%w")  WHEN "0" THEN count ELSE 0 END) AS "日曜"')
        ->selectRaw('SUM(CASE  DATE_FORMAT(date, "%w")  WHEN "1" THEN count ELSE 0 END) AS "月曜"')
        ->selectRaw('SUM(CASE  DATE_FORMAT(date, "%w")  WHEN "2" THEN count ELSE 0 END) AS "火曜"')
        ->selectRaw('SUM(CASE  DATE_FORMAT(date, "%w")  WHEN "3" THEN count ELSE 0 END) AS "水曜"')
        ->selectRaw('SUM(CASE  DATE_FORMAT(date, "%w")  WHEN "4" THEN count ELSE 0 END) AS "木曜"')
        ->selectRaw('SUM(CASE  DATE_FORMAT(date, "%w")  WHEN "5" THEN count ELSE 0 END) AS "金曜"')
        ->selectRaw('SUM(CASE  DATE_FORMAT(date, "%w")  WHEN "6" THEN count ELSE 0 END) AS "土曜"')
        ->groupby('admin_id')
        ->get();
        // dd($baravgweekquerys);
        $week = ["日曜","月曜","火曜","水曜","木曜","金曜","土曜"];
        for($i=0; $i<7; $i++)
        {
            $barweekvalues[] = $barweekquerys[0][$week[$i]];
            $barweekkeys[] = $week[$i];
        }
        // dump($barweekkeys);
        // dd($barweekvalues);
        $keys = ['家','研究室','外出','学内','長期不在'];
        $keys1 = ['アイウエ','お','なんでな','やい','えい'];
        $counts = [10,4,3,2,1];
        $counts = [10,4,3,2,1];
        return view('admin_screen.chart',['linekeys' => $linekeys, 'linecounts' => $linecounts, 'barweekvalues' => $barweekvalues, 'barweekkeys' => $barweekkeys, 'keys' => $keys, 'counts' => $counts, 'keys1' => $keys1]);
    }
}
